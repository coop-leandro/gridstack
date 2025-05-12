<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GridStackLayout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class DashboardEditor extends Component
{
    public $layout;
    public $isManager = false;
    public $userId;
    protected $listeners = [
        'saveLayout' => 'saveLayout',
        'resetLayout' => 'resetLayout',
    ];

    public function mount()
    {
        try {
            $userId = Auth::id();
            $this->userId = $userId;
            if (!$userId) {
                return redirect('/');
                throw new Exception('Usuário não autenticado.');
            }

            $user = User::find($userId);
            if (!$user) {
                return redirect('/');
            }

            // Define se o usuário é um superior (tem subordinados)
            $this->isManager = $user->subordinates->isNotEmpty();

            // Carrega e mescla o layout com o layout de todos os superiores
            $this->loadLayout($user);

        } catch (Exception $e) {
            Log::error('Erro no método mount: ' . $e->getMessage());
            $this->layout = [];
        }
        return view('dashboard.index', $this->layout);
    }

    protected function loadLayout($user)
    {
        // Recupera os layouts de todos os superiores
        $supervisorLayouts = $this->getAllSupervisorLayouts($user);

        // Recupera o layout do próprio usuário
        $userLayout = $this->getLayoutForUser($user);

        // Mescla o layout do usuário com os layouts dos superiores
        $this->layout = $this->mergeLayouts($userLayout, $supervisorLayouts);
    }

    protected function getAllSupervisorLayouts($user)
    {
        $supervisorLayouts = [];

        // Percorre todos os supervisores até o topo da hierarquia
        while ($user->supervisor) {
            $supervisor = $user->supervisor;
            $supervisorLayouts[] = $this->getLayoutForUser($supervisor);
            $user = $supervisor;
        }

        return $supervisorLayouts;
    }

    protected function getLayoutForUser($user)
    {
        $layoutModel = GridStackLayout::firstOrCreate(
            ['guest_id' => $user->id],
            ['layout' => "[]"]
        );

        return $this->safeJsonDecode($layoutModel->layout);
    }

    protected function safeJsonDecode($json)
    {
        try {
            $decoded = json_decode($json);
            return $decoded !== null ? $decoded : [];
        } catch (Exception $e) {
            Log::error('Erro ao decodificar JSON: ' . $e->getMessage());
            return [];
        }
    }

    protected function mergeLayouts($userLayout, $supervisorLayouts)
    {
        try {
            $merged = [];

            // Adiciona os widgets fixados de todos os supervisores
            foreach ($supervisorLayouts as $supervisorLayout) {
                foreach ($supervisorLayout as $widget) {
                    if (isset($widget->locked) && $widget->locked) {
                        $merged[] = $widget; 
                    }
                }
            }

            // Adiciona os widgets do usuário, não duplicando os fixados dos supervisores
            foreach ($userLayout as $widget) {
                if (!in_array($widget, $merged)) {
                    $merged[] = $widget; 
                }
            }

            return $merged;
        } catch (Exception $e) {
            Log::error('Erro ao mesclar layouts: ' . $e->getMessage());
            return array_merge($userLayout, $supervisorLayouts);
        }
    }

    public function saveLayout($layout)
    {
        $userId = Auth::id();
        //dd($layout);
        foreach($layout as $item){

            $userWidgets = collect($layout)
                ->filter(fn($item) => empty(data_get($item, 'locked_by')) || data_get($item, 'locked_by') == $userId)
                ->values()
                ->all();
        }
        //dd($userWidgets);
        try {

            if (!$userId) {
                return redirect('/');
                throw new Exception('Usuário não autenticado.');
            }

            if (!is_array($userWidgets)) {
                throw new Exception('Dados de layout inválidos.');
            }

            GridStackLayout::updateOrCreate(
                ['guest_id' => $userId],
                ['layout' => json_encode($userWidgets)]
            );
            
            $this->dispatch('layoutSaved');
        } catch (Exception $e) {
            Log::error('Erro ao salvar layout: ' . $e->getMessage());
        }
    }

    public function resetLayout()
    {
        try {
            $userId = Auth::id();
            if (!$userId) {
                throw new Exception('Usuário não autenticado.');
            }

            $user = User::find($userId);
            if (!$user) {
                throw new Exception('Usuário não encontrado.');
            }

            // Recupera os layouts de todos os supervisores ou o layout padrão
            $supervisorLayouts = $this->getAllSupervisorLayouts($user);

            $flattenedLayout = array_merge(...$supervisorLayouts);

            // Reseta o layout do usuário
            $layoutJson = json_encode($flattenedLayout);

            GridStackLayout::updateOrCreate(
                ['guest_id' => $userId],
                ['layout' => $layoutJson]
            );

            $this->layout = $this->safeJsonDecode($layoutJson);
            $this->dispatch('layoutSaved');
        } catch (Exception $e) {
            Log::error('Erro ao resetar layout: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}

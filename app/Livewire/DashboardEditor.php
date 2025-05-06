<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GridStackLayout;
use App\Models\Sector;
use App\Models\SectorLayouts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class DashboardEditor extends Component
{
    public $layout;
    public $noticias;
    public $isManager = false;
    protected $listeners = [
        'saveLayout' => 'saveLayout',
        'setDefaultLayoutSector' => 'setDefaultLayoutSector',
        'resetLayout' => 'resetLayout',
    ];

    public function mount()
    {
        try {
            $userId = Auth::id();
            if (!$userId) {
                return redirect('/');
                throw new Exception('Usuário não autenticado.');
            }

            $user = User::find($userId);
            if (!$user) {
                return redirect('/');
            }

            $this->isManager = Sector::where('manager_id', $userId)->exists();

            $sectorLayout = SectorLayouts::firstOrCreate(
                ['sector_id' => $user->sector_id],
                ['layout' => "[]"]
            );

            if ($this->isManager) {
                $this->layout = $this->safeJsonDecode($sectorLayout->layout);
            } else {
                $userLayout = GridStackLayout::firstOrCreate(
                    ['guest_id' => $userId],
                    ['layout' => "[]"]
                );
                
                $this->layout = $this->mergeLayouts(
                    $this->safeJsonDecode($userLayout->layout),
                    $this->safeJsonDecode($sectorLayout->layout)
                );
            }
        } catch (Exception $e) {
            Log::error('Erro no método mount: ' . $e->getMessage());
            $this->layout = [];
            session()->flash('error', 'Ocorreu um erro ao carregar o dashboard.');
        }

        return view('dashboard.index', [
            'layout' => $this->layout,
            'isManager' => $this->isManager
        ]);
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

    protected function mergeLayouts($userLayout, $sectorLayout)
    {
        try {
            $userLayout = is_array($userLayout) ? $userLayout : [];
            $sectorLayout = is_array($sectorLayout) ? $sectorLayout : [];

            $merged = [];
            $widgetsProcessados = [];

            foreach ($sectorLayout as $sectorItem) {
                if (!is_object($sectorItem)) continue;
                
                if (isset($sectorItem->widgetIndex) && ($sectorItem->locked_from_sector ?? false)) {
                    $sectorItem->locked = true;
                    $sectorItem->noMove = true;
                    $sectorItem->noResize = true;
                    
                    $merged[] = $sectorItem;
                    $widgetsProcessados[$sectorItem->widgetIndex] = 'bloqueado';
                }
            }

            foreach ($userLayout as $userItem) {
                if (!is_object($userItem)) continue;
                if (!isset($userItem->widgetIndex)) continue;
                
                if (($widgetsProcessados[$userItem->widgetIndex] ?? null) === 'bloqueado') {
                    continue;
                }
                
                $merged = array_filter($merged, fn($item) => 
                    !is_object($item) || !isset($item->widgetIndex) || $item->widgetIndex !== $userItem->widgetIndex
                );
                
                $merged[] = $userItem;
            }

            return $merged;
        } catch (Exception $e) {
            Log::error('Erro ao mesclar layouts: ' . $e->getMessage());
            return array_merge($userLayout, $sectorLayout);
        }
    }

    public function saveLayout($layout)
    {
        try {
            $userId = Auth::id();
            
            if (!$userId) {
                return redirect('/');
                throw new Exception('Usuário não autenticado.');
            }

            if (!is_array($layout)) {
                throw new Exception('Dados de layout inválidos.');
            }

            GridStackLayout::updateOrCreate(
                ['guest_id' => $userId],
                ['layout' => json_encode($layout)]
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

            $sectorId = $user->sector_id;
            $layoutJson = "[]";

            if ($sectorId) {
                $sectorLayout = SectorLayouts::where('sector_id', $sectorId)->first();
                if ($sectorLayout) {
                    $layoutJson = $sectorLayout->layout;
                }
            }

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

    public function setDefaultLayoutSector($layout)
    {
        try {
            $userId = Auth::id();
            if (!$userId) {
                return redirect('/');
                throw new Exception('Usuário não autenticado.');
            }

            if (!is_array($layout)) {
                throw new Exception('Dados de layout inválidos.');
            }

            $user = User::find($userId);
            if (!$user) {
                return redirect('/');
                throw new Exception('Usuário não encontrado.');
            }

            if ($this->isManager) {
                $sectorId = $user->sector_id; 
                if (!$sectorId) {
                    return redirect('/');
                    throw new Exception("Usuário não está associado a um setor.");
                }

                SectorLayouts::updateOrCreate(
                    ['sector_id' => $sectorId],
                    ['layout' => json_encode($layout)]
                );
            }
            
            $this->dispatch('layoutSaved');
        } catch (Exception $e) {
            Log::error('Erro ao definir layout padrão do setor: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}
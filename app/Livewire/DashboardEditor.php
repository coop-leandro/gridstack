<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DashboardEditor extends Component
{
    public $layout;
    public $isManager = false;
    public $userId;
    public $user;
    protected $listeners = [
        'saveLayout' => 'saveLayout',
        'resetLayout' => 'resetLayout',
    ];

    public function mount()
    {
        $this->user = Auth::user();

        try {
            $response = Http::get('http://host.docker.internal:8000/dashboard/layout', ['user_id' => $this->user->id]);
            if($response->successful()){
                $this->layout = $response->json('layout');
                $this->isManager = $response->json('isManager');
                $this->userId = $response->json('userId');
            } else {
                Log::error('Erro ao carregar layout: ' . $response->body());
                $this->layout = [];
            }
        } catch (Exception $e) {
            Log::error('Erro no método mount: ' . $e->getMessage());
            $this->layout = [];
        }
        return view('dashboard.index', $this->layout);
    }

    public function saveLayout($layout){
        try {
            Http::post('http://host.docker.internal:8000/dashboard/layout', [
                'user_id' => $this->user->id,
                'layout' => $layout,
            ]);
            $this->dispatch('layoutSaved');
        } catch (Exception $e) {
            Log::error('Erro ao salvar layout: ' . $e->getMessage());
        }
    }

    public function resetLayout(){
        try{
            Http::post('http://host.docker.internal:8000/dashboard/layout/reset', ['user_id' => $this->user->id]);
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

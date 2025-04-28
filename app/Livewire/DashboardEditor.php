<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GridStackLayout;
use App\Models\Sector;
use App\Models\SectorLayouts;
use App\Models\User;
use App\Models\WidgetLog;
use Illuminate\Support\Facades\Auth;


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
        $userId = Auth::id();
        $user = User::find($userId);
        $this->isManager = Sector::where('manager_id', $userId)->exists();

        // Layout do setor (carregado para todos)
        $sectorLayout = SectorLayouts::firstOrCreate(
            ['sector_id' => $user->sector_id],
            ['layout' => "[]"]
        );

        if ($this->isManager) {
            // GERENTE: usa APENAS o layout completo do setor
            $this->layout = json_decode($sectorLayout->layout);
        } else {
            // USUÁRIO NORMAL: faz o merge normal
            $userLayout = GridStackLayout::firstOrCreate(
                ['guest_id' => $userId],
                ['layout' => "[]"]
            );
            
            $this->layout = $this->mergeLayouts(
                json_decode($userLayout->layout),
                json_decode($sectorLayout->layout)
            );
        }
        return view('dashboard.index', [
            'layout' => $this->layout,
            'isManager' => $this->isManager
        ]);
    }

    protected function mergeLayouts($userLayout, $sectorLayout)
    {
        $userLayout = is_array($userLayout) ? $userLayout : [];
        $sectorLayout = is_array($sectorLayout) ? $sectorLayout : [];

        $merged = [];
        $widgetsProcessados = [];

        // 1. Processa widgets BLOQUEADOS do setor
        foreach ($sectorLayout as $sectorItem) {
            if (isset($sectorItem->widgetIndex) && ($sectorItem->locked_from_sector ?? false)) {
                // Garante propriedades de bloqueio
                $sectorItem->locked = true;
                $sectorItem->noMove = true;
                $sectorItem->noResize = true;
                
                $merged[] = $sectorItem;
                $widgetsProcessados[$sectorItem->widgetIndex] = 'bloqueado';
            }
        }

        // 2. Processa widgets do usuário
        foreach ($userLayout as $userItem) {
            if (!isset($userItem->widgetIndex)) continue;

            // Se já existe como bloqueado, mantém o bloqueado
            if (($widgetsProcessados[$userItem->widgetIndex] ?? null) === 'bloqueado') {
                continue;
            }
            
            // Remove versão anterior se existir (para evitar duplicação)
            $merged = array_filter($merged, fn($item) => 
                !isset($item->widgetIndex) || $item->widgetIndex !== $userItem->widgetIndex
            );
            
            $merged[] = $userItem;
        }

        return $merged;
    }

    public function saveLayout($layout)
    {
        //dd($layout);
        $userId = Auth::id();        
        GridStackLayout::updateOrCreate(
            ['guest_id' => $userId],
            ['layout' => json_encode($layout)]
        );
    }


    public function resetLayout(){
        $userId = Auth::id();
        $user = User::find($userId);
        $sectorId = $user->sector_id;

        if($sectorId){
            $sectorLayout = SectorLayouts::where('sector_id', $sectorId)->first();
            if($sectorLayout){
                $layoutJson = $sectorLayout->layout;
            }else{
                $layoutJson = "[]";
            }
        }else{
            $layoutJson = "[]";
        }

        GridStackLayout::updateOrCreate(
            ['guest_id' => $userId],
            ['layout' => $layoutJson]
        );
    
        $this->layout = json_decode($layoutJson);
    }

    public function setDefaultLayoutSector($layout){
        //dd($layout);
        $userId = Auth::id();
        $user = User::find($userId);
        $layoutJson = json_encode($layout);
        if ($this->isManager) {
            $sectorId = $user->sector_id; 
            if (!$sectorId) {
                throw new \Exception("Usuário não está associado a um setor.");
            }
            $layoutJson = json_encode($layout);
            SectorLayouts::updateOrCreate(
                ['sector_id' => $sectorId],
                ['layout' => $layoutJson]
            );
        } 
    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}

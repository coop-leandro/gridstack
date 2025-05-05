<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GridStackLayout;
use App\Models\Sector;
use App\Models\SectorLayouts;
use App\Models\User;
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

        if(!$user){
            return redirect('/');
        }

        $sectorLayout = SectorLayouts::firstOrCreate(
            ['sector_id' => $user->sector_id],
            ['layout' => "[]"]
        );

        if ($this->isManager) {
            $this->layout = json_decode($sectorLayout->layout);
        } else {
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

        foreach ($sectorLayout as $sectorItem) {
            if (isset($sectorItem->widgetIndex) && ($sectorItem->locked_from_sector ?? false)) {
                $sectorItem->locked = true;
                $sectorItem->noMove = true;
                $sectorItem->noResize = true;
                
                $merged[] = $sectorItem;
                $widgetsProcessados[$sectorItem->widgetIndex] = 'bloqueado';
            }
        }

        foreach ($userLayout as $userItem) {
            if (!isset($userItem->widgetIndex)) continue;
            if (($widgetsProcessados[$userItem->widgetIndex] ?? null) === 'bloqueado') {
                continue;
            }
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
        $this->dispatch('layoutSaved');
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
        $this->dispatch('layoutSaved');
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
                return redirect('/dashboard');
            }
            $layoutJson = json_encode($layout);
            SectorLayouts::updateOrCreate(
                ['sector_id' => $sectorId],
                ['layout' => $layoutJson]
            );
        } 
        $this->dispatch('layoutSaved');
    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}

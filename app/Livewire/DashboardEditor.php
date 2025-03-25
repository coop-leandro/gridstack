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
        'resetLayout' => 'resetLayout'
    ];

    public function mount()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $this->isManager = Sector::where('manager_id', $userId)->get()->first();
        $layout = GridStackLayout::where('guest_id', $userId)->first(); 
        if($layout == null){
            GridStackLayout::create([
                'guest_id' => $userId,
                'layout' => "[]"
            ]);
        }
        $userSector = $user->sector_id;
        $sectorLayout = SectorLayouts::where('sector_id', $userSector)->get()->first();
        if($sectorLayout == null){
            SectorLayouts::create([
                'sector_id' => $userSector,
                'layout' => "[]"
            ]);
        }
        if($sectorLayout && $layout->layout == "[]"){
            $this->layout = json_decode($sectorLayout->layout);
        }else if($layout){ 
            $this->layout = json_decode($layout->layout);
        }else{
            $this->layout = [];
        }
        return view('dashboard', ['layout' => $this->layout, 'isManager' => $this->isManager]);
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

    public function saveLayout($layout)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $layoutJson = json_encode($layout);
        //dd($layout);
        GridStackLayout::updateOrCreate(
            ['guest_id' => $userId],
            ['layout' => $layoutJson] 
        );

        foreach ($layout as $item) {
            WidgetLog::logUsage($item['widgetIndex']);
        }

    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}

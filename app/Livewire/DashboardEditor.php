<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GridStackLayout;
use Illuminate\Support\Facades\Cookie;

class DashboardEditor extends Component
{
    public $layout;
    protected $listeners = ['saveLayout' => 'saveLayout'];

    public function mount()
    {
        $guest_id = request()->cookie('guest_id');
        $layout = GridStackLayout::where('guest_id', $guest_id)->first(); 
    
        if ($layout) {
            $this->layout = json_decode($layout->layout); 
        } else {
            $this->layout = [];
        }
        return view('dashboard', $this->layout);
    }

    public function saveLayout($layout)
    {
        $guestId = Cookie::get('guest_id');
        $layoutJson = json_encode($layout);

        GridStackLayout::updateOrCreate(
            ['guest_id' => $guestId],
            ['layout' => $layoutJson] 
        );

        session()->flash('message', 'Layout salvo com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard-editor');
    }
}

<?php

namespace App\Livewire;

use App\Models\WidgetEx;
use Livewire\Component;

class WidgetsEx extends Component
{
    
    public $infos;
    public $titulo;
    public $descricao;

    public function mount(){
        $this->infos = WidgetEx::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function createInfo(){
        WidgetEx::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
        ]);

        $this->titulo = '';
        $this->descricao = '';

        $this->infos = WidgetEx::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.widgets-ex');
    }
}

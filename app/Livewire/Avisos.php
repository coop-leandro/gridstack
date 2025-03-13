<?php

namespace App\Livewire;

use App\Models\Aviso;
use Livewire\Component;

class Avisos extends Component
{
    public $avisos;
    public $titulo;
    public $mensagem;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'mensagem' => 'required|string',
    ];

    public function mount(){
        $this->avisos = Aviso::all()->take(5);
    }

    public function createNotice(){
        $this->validate();

        Aviso::create([
            'titulo' => $this->titulo,
            'mensagem' => $this->mensagem,
        ]);
        
        $this->titulo = '';
        $this->mensagem = '';

        $this->avisos = Aviso::all()->take(5);
    }

    public function render()
    {
        return view('livewire.avisos');
    }
}

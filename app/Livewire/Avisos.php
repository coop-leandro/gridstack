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
        $this->avisos = Aviso::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function createNotice(){
        $this->validate();

        Aviso::create([
            'titulo' => $this->titulo,
            'mensagem' => $this->mensagem,
        ]);
        
        $this->titulo = '';
        $this->mensagem = '';

        $this->avisos = Aviso::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function deleteNotice($id){
        Aviso::findOrFail($id)->delete();

        $this->avisos = Aviso::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.avisos');
    }
}

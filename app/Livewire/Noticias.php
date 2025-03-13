<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;

class Noticias extends Component
{
    public $noticias;
    public $titulo = '';
    public $conteudo = '';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'conteudo' => 'required|string',
    ];

    public function mount(){
        $this->noticias = Noticia::all();
    }

    public function createNews(){
        $this->validate();
        
        Noticia::create([
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo
        ]);

        $this->titulo = '';
        $this->conteudo = '';

        $this->noticias = Noticia::all()->take(5);

    }
    
    public function render()
    {
        return view('livewire.noticias');
    }
}

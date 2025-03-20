<?php

namespace App\Livewire;

use App\Models\Feed;
use Livewire\Component;

class Feeds extends Component
{
    public $titulo;
    public $descricao;
    public $feeds;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
    ];
    
    public function mount(){
        $this->feeds = Feed::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function createFeed(){
        $this->validate();

        Feed::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao
        ]);

        $this->titulo = '';
        $this->descricao = '';

        $this->feeds = Feed::orderBy('created_at', 'asc')->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.feeds');
    }
}

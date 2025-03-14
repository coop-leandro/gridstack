<?php

namespace App\Livewire;

use Livewire\Component;


class SearchBar extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        //dd($this->search);
        $this->dispatch('searchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}

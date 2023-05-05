<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class SearchNoticia extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-noticia');
    }

    public function getResultsProperty()
    {
        
        return Notice::where('title_' . app()->getLocale(), 'LIKE', '%' . $this->search . '%')->whereNotIn('status', [1,3])->take(6)->get();
    }
}

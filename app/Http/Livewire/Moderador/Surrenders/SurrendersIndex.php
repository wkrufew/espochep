<?php

namespace App\Http\Livewire\Moderador\Surrenders;

use App\Models\Surrender;
use Livewire\Component;
use Livewire\WithPagination;

class SurrendersIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $surrenders = Surrender::latest('id')
                                ->where('anio', 'LIKE', '%' . $this->search . '%')
                                ->paginate(6);
        return view('livewire.moderador.surrenders.surrenders-index', compact('surrenders'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}

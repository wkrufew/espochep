<?php

namespace App\Http\Livewire\Moderador\Transparencies;

use App\Models\Transparency;
use Livewire\Component;
use Livewire\WithPagination;

class TransparenciesIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $transparencies = Transparency::latest('id')
                                            ->where('anio', 'LIKE', '%' . $this->search . '%')
                                            ->paginate(6);
        return view('livewire.moderador.transparencies.transparencies-index', compact('transparencies'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}

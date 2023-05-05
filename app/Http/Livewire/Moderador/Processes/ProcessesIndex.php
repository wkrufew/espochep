<?php

namespace App\Http\Livewire\Moderador\Processes;

use App\Models\Process;
use Livewire\Component;
use Livewire\WithPagination;

class ProcessesIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $processes = Process::where('user_id', auth()->user()->id)
                                ->whereNotIn('status', [6])
                                ->where('title_es', 'LIKE', '%' . $this->search . '%')
                                ->latest('id')
                                ->paginate(6);

        return view('livewire.moderador.processes.processes-index', compact('processes'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
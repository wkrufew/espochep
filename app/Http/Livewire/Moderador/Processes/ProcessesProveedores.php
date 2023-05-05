<?php

namespace App\Http\Livewire\Moderador\Processes;

use App\Models\Process;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProcessesProveedores extends Component
{
    use AuthorizesRequests;
    use WithPagination; 

    public $process, $search;
    public $open = false;

    public function mount(Process $process)
    {
        $this->process = $process;
        $this->authorize('mod_processes',$process);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $proveedores = $this->process->proveedores()->where('name', 'LIKE', '%' . $this->search . '%')
                                                    ->latest()->paginate(6);

        return view('livewire.moderador.processes.processes-proveedores',compact('proveedores'))->layout('layouts.moderador', ['process' => $this->process]);
    }
}

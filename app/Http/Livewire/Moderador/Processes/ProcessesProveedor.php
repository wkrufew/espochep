<?php

namespace App\Http\Livewire\Moderador\Processes;

use App\Models\Process;
use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProcessesProveedor extends Component
{
    use AuthorizesRequests;
    public $process, $proveedor;

    public function mount(Process $process,User $proveedor)
    {
        $this->process = $process;
        $this->proveedor = $proveedor;
        $this->authorize('mod_processes',$process);
    }
    public function render()
    {
        $prov = $this->process->proveedores()->find($this->proveedor->id);

        return view('livewire.moderador.processes.processes-proveedor',compact('prov'))->layout('layouts.moderador', ['process' => $this->process]);
    }

    public function status($status)
    {
        if ($status == 1) {
            $this->process->proveedores()->updateExistingPivot($this->proveedor->id, ['status' => 2]);
        } else {
            $this->process->proveedores()->updateExistingPivot($this->proveedor->id, ['status' => 1]);
        }
        return redirect()->back();
    }


}

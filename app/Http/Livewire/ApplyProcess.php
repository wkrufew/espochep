<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Mail\SendProforma;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApplyProcess extends Component
{
    use WithFileUploads;

    public $process, $multiple = false;
    public $monto;
    public $file;
    public $url;
    public $original;

    public function mount(Process $process)
    {
        $this->process = $process;
    }
    public function render()
    {
        return view('livewire.apply-process');
    }

    public function save()
    {

        if ($this->multiple) {
            $this->validate([
                'monto' => 'required',
                'url' => 'required',
                /* 'file' => 'required|file|mimes:pdf|max:2048', */
            ]);
        } else {
            $this->validate([
                'monto' => 'required',
                'file' => 'required|mimes:pdf|max:2048',
            ]);
        }

        try {
            DB::beginTransaction();
                $data['moderador'] = $this->process->moderador->name;
                $data['title'] = $this->process->title_es;
                $data['code'] = $this->process->code;
                $data['monto'] = $this->monto;
                $data['nombre'] = auth()->user()->name;
                $data['correo'] = auth()->user()->email;
                $data['url'] = $this->url;

                
                if ($this->file) {
                    $this->original = $this->file->getClientOriginalName();
                    $this->file = $this->file->storeAs('proformas', $this->original);
                }
                $this->process->proveedores()->attach(auth()->user()->id, ['monto' => $this->monto, 'cantidad' => $this->file, 'url' => $this->url]);
                DB::afterCommit(function () use ($data){    
                    Mail::to($this->process->moderador->email)->send(new SendProforma($data));
                });

            DB::commit();

            $this->reset('monto', 'url', 'file','multiple','original');
            session()->flash('exito', 'Aplicó al proceso con éxito');
            return redirect()->route('process.show', $this->process);

        } catch (\Throwable $th) {
            DB::rollBack();
            if ($this->file) {
                Storage::delete($this->file);
            }
            $this->reset('monto', 'url', 'file','multiple','original');
            session()->flash('errora', 'No se pudo aplicar al proceso ocurrio un error vuelve a intentarlo mas tarde');
            return redirect()->route('process.show', $this->process);
        }       
        
        
    }
}

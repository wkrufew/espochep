<?php

namespace App\Http\Livewire;

use App\Models\Transparency;
use App\Models\Year;
use Livewire\Component;

class TransparencyIndex extends Component
{
    public $transparency,$transparencia, $identificador,$year,$idmes;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.transparency-index');
    }

    public function cargarMes(Transparency $item)
    {
        $this->idmes='';
        $this->identificador = $item->id;
        $this->transparencia = $item;
        $this->idmes = Year::select('id')->firstWhere('transparency_id',$item->id);
        $this->emit('refreshComponent');
    }

    public function limpiar()
    {
        $this->reset(['identificador','transparencia','idmes']);
    }
}

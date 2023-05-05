<?php

namespace App\Http\Livewire;

use App\Models\Stage;
use App\Models\Surrender;
use Livewire\Component;

class SurrenderIndex extends Component
{
    public $surrender,$rendicion, $identificador,$year,$idstage;

    protected $listeners = ['refreshComponents' => '$refresh'];

    public function render()
    {
        return view('livewire.surrender-index');
    }

    public function cargarMes(Surrender $item)
    {
        $this->idstage='';
        $this->identificador = $item->id;
        $this->rendicion = $item;
        $this->idstage = Stage::select('id')->firstWhere('surrender_id',$item->id);
        $this->emit('refreshComponents');
    }

    public function limpiar()
    {
        $this->reset(['identificador','rendicion','idstage']);
    }
}

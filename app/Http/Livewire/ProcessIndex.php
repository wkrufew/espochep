<?php

namespace App\Http\Livewire;

use App\Models\Process;
use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;

class ProcessIndex extends Component
{
    use WithPagination;
    
    public $orden = 'DESC';
    public $purchase = [];

    public function updatingPurchase()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $categories = Purchase::select('id','name_es','name_en')->get();
        if (count($this->purchase) > 0) {
            $processes = Process::with('moderador:id,name,email')->withCount('proveedores')->whereNotIn('status', [1,5,6])->whereIn('purchase_id', $this->purchase)->orderBy('id',$this->orden)->paginate(6);
        } else {
            $processes = Process::with('moderador:id,name,email')->withCount('proveedores')->whereNotIn('status', [1,5,6])->orderBy('id',$this->orden)->paginate(6);
        }
        return view('livewire.process-index', compact('processes','categories'));
    }

    public function limpiar(){
        $this->orden = 'DESC';
        $this->purchase = [];
    }
    
}

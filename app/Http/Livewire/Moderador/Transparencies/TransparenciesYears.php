<?php

namespace App\Http\Livewire\Moderador\Transparencies;

use App\Models\Transparency;
use App\Models\Year;
use Livewire\Component;

class TransparenciesYears extends Component
{
    public $transparency, $year, $mes;

    protected $rules = [
        'year.mes' => 'required',
    ];

    public function mount(Transparency $transparency)
    {
        $this->transparency = $transparency;
        $this->year = new Year();
    }   
    public function render()
    {
        return view('livewire.moderador.transparencies.transparencies-years')->layout('layouts.transparency', ['transparency' => $this->transparency]);
    }

    public function edit(Year $year)
    {
        $this->year = $year;
    }

    public function update()
    {
        $this->validate();
        $this->year->save();
        $this->year = new Year();

        $this->transparency = Transparency::find($this->transparency->id);
    }

    public function store()
    {
        $rules = [
            'mes' => 'required'
        ];

        $this->validate($rules);
        
        Year::create([
            'mes' => $this->mes,
            'transparency_id' => $this->transparency->id
        ]);

        $this->reset('mes');

        $this->transparency = Transparency::find($this->transparency->id);
    }

    public function destroy(Year $item)
    {
        $item->delete();

        $this->transparency = Transparency::find($this->transparency->id);
    }
}

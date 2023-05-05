<?php

namespace App\Http\Livewire\Moderador\Surrenders;

use App\Models\Stage;
use App\Models\Surrender;
use Livewire\Component;

class SurrendersStages extends Component
{
    public $surrender, $stage, $name;

    protected $rules = [
        'stage.name' => 'required',
    ];
    protected $messages =[
        'stage.name.required' => 'Este campo es requerido'
    ];

    public function mount(Surrender $surrender)
    {
        $this->surrender = $surrender;
        $this->stage = new Stage();
    }
    public function render()
    {
        return view('livewire.moderador.surrenders.surrenders-stages')->layout('layouts.surrender', ['surrender' => $this->surrender]);
    }

    public function edit(Stage $stage)
    {
        $this->stage = $stage;
    }

    public function update()
    {
        $this->validate();
        $this->stage->save();
        $this->stage = new Stage();

        $this->surrender = Surrender::find($this->surrender->id);
    }

    public function store()
    {
        $rules = [
            'name' => 'required'
        ];

        $messages =[
            'name.required' => 'Este campo es requerido',
            'url_file.string' => 'Este campo debe contener caracteres alfabeticos'
        ];

        $this->validate($rules, $messages);
        
        Stage::create([
            'name' => $this->name,
            'surrender_id' => $this->surrender->id
        ]);

        $this->reset('name');

        $this->surrender = Surrender::find($this->surrender->id);
    }

    public function destroy(Stage $item)
    {
        $item->delete();

        $this->surrender = Surrender::find($this->surrender->id);
    }
}

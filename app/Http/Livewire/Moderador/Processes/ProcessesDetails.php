<?php

namespace App\Http\Livewire\Moderador\Processes;

use App\Models\Detail;
use App\Models\Section;
use Livewire\Component;

class ProcessesDetails extends Component
{
    public $section, $detail, $name_es,$name_en;

    protected $rules = [
        'detail.name_es' => 'required',
        'detail.name_en' => 'required',
    ];

    public function mount(Section $section)
    {
        $this->section = $section; 
        $this->detail = new Detail();
    }
    public function render()
    {
        return view('livewire.moderador.processes.processes-details');
    }

    public function store()
    {
        $rules = [
            'name_es' => 'required',
            'name_en' => 'required',
        ];
        $messages =[
            'name_es.required' => 'Este campo es requerido por favor ingresa un nombre',
            'name_en.required' => 'Este campo es requerido por favor ingresa un nombre',
        ];


        $this->validate($rules, $messages);

        Detail::create([
            'name_es' => $this->name_es,
            'name_en' => $this->name_en,
            'section_id' => $this->section->id
        ]);

        //esto ayuda a resetear las variables
        $this->reset(['name_es','name_en']);
        
        $this->section = Section::find($this->section->id);
        
    }

    public function edit(Detail $detail)
    {
        $this->resetValidation();
        $this->detail = $detail;
    }


    public function update()
    {
       
            $rules = [
                'detail.name_es' => 'required',
                'detail.name_en' => 'required',
            ];
            $messages =[
                'detail.name_es.required' => 'Este campo es requerido por favor ingresa un nombre',
                'detail.name_en.required' => 'Este campo es requerido por favor ingresa un nombre'
            ];
    
            $this->validate($rules, $messages);


        $this->detail->save();

        $this->detail = new Detail();

        $this->section = Section::find($this->section->id);
    }

    public function destroy(Detail $item)
    {
        $item->delete();
        
        $this->section = Section::find($this->section->id);
    }

    public function cancel()
    {
        $this->detail = new Detail();
    }
}

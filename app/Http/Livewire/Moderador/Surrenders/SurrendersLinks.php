<?php

namespace App\Http\Livewire\Moderador\Surrenders;

use App\Models\Link;
use App\Models\Stage;
use Livewire\Component;

class SurrendersLinks extends Component
{
    public $stage, $link, $title,$url_file;

    protected $rules = [
        'link.title' => 'required',
        'link.url_file' => 'string | nullable',
    ];

    public function mount(Stage $stage)
    {
        $this->stage = $stage; 
        $this->link = new Link();
    }
    public function render()
    {   
        //$this->url_file = $this->link->link;

        return view('livewire.moderador.surrenders.surrenders-links');
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'url_file' => 'string | nullable',
        ];
        $messages =[
            'title.required' => 'Este campo es requerido',
            'url_file.string' => 'Este campo require de caracteres alfabeticos',
        ];


        $this->validate($rules, $messages);

        Link::create([
            'title' => $this->title,
            'url_file' => $this->url_file,
            'stage_id' => $this->stage->id
        ]);

        //esto ayuda a resetear las variables
        $this->reset(['title','url_file']);
        
        $this->stage = Stage::find($this->stage->id);
        
    }

    public function edit(Link $link)
    {
        $this->resetValidation();
        $this->link = $link;
    }


    public function update()
    {
       
            /* $rules = [
                'link.title' => 'required',
            ];
            $messages =[
                'link.title.required' => 'Este campo es requerido',
            ];
    
            $this->validate($rules, $messages); */
            $this->validate();


        $this->link->save();

        $this->link = new Link();

        $this->stage = Stage::find($this->stage->id);
    }

    public function destroy(Link $item)
    {
        $item->delete();
        
        $this->stage = Stage::find($this->stage->id);
    }

    public function cancel()
    {
        $this->link = new Link();
    }
}

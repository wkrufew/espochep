<?php

namespace App\Http\Livewire\Moderador\Transparencies;

use App\Models\Month;
use App\Models\Year;
use Livewire\Component;

class TransparenciesMonths extends Component
{
    public $year, $month, $title,$url_file;

    protected $rules = [
        'month.title' => 'required',
        'month.url_file' => 'required | nullable',
    ];

    public function mount(Year $year)
    {
        $this->year = $year; 
        $this->month = new Month();  
    }
    public function render()
    {
        return view('livewire.moderador.transparencies.transparencies-months');
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

        Month::create([
            'title' => $this->title,
            'url_file' => $this->url_file,
            'year_id' => $this->year->id
        ]);

        //esto ayuda a resetear las variables
        $this->reset(['title','url_file']);
        
        $this->year = Year::find($this->year->id);
        
    }

    public function edit(Month $month)
    {
        $this->resetValidation();
        $this->month = $month;
    }

    public function update()
    {
       
           /*  $rules = [
                'month.title' => 'required',
                'month.url_file' => 'string | nullable',
            ];
            $messages =[
                'month.title.required' => 'Este campo es requerido',
                'month.url_file.string' => 'Este campo debe contener caracteres alfabeticos'
            ]; */
    
            $this->validate();


        $this->month->save();

        $this->month = new Month();

        $this->year = Year::find($this->year->id);
    }

    public function destroy(Month $item)
    {
        $item->delete();
        
        $this->year = Year::find($this->year->id);
    }

    public function cancel()
    {
        $this->month = new Month();
    }
}

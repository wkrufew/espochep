<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;

class Search extends Component
{
    public $search, $tipo1="", $tipo = "title_";

    public function render()
    {
        if ($this->tipo ===  'title_'){
            if (app()->getLocale()== 'es') {
                $this->tipo1 = "Titulo";
            } else {
                $this->tipo1 = "Title";
            }
        } else {
            if (app()->getLocale()== 'es') {
                $this->tipo1 =  "Codigo";
            } else {
                $this->tipo1 =  "Code";
            }
        }

        return view('livewire.search');
    }

    public function getResultsProperty()
    {
        if ($this->tipo ===  'title_') {
            return Process::where( $this->tipo . app()->getLocale(), 'LIKE', '%' . $this->search . '%')->whereNotIn('status', [1,5,6])->take(6)->get();
        } else {
            return Process::where( $this->tipo, 'LIKE', '%' . $this->search . '%')->whereNotIn('status', [1])->take(6)->get();
        }  
    }
}

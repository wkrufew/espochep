<?php

namespace App\Http\Livewire;

use App\Models\Month;
use App\Models\Year;
use Livewire\Component;

class MonthIndex extends Component
{
    public $year, $month, $title;

    public function mount(Year $year)
    {
        $this->year = $year; 
        $this->month = new Month();
    }
    
    public function render()
    {
        return view('livewire.month-index');
    }
}

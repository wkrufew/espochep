<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SurrenderLayout extends Component
{
    public $surrender;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($surrender)
    {
        $this->surrender = $surrender;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.surrender');
    }
}

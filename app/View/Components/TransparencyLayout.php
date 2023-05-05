<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TransparencyLayout extends Component
{
    public $transparency;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($transparency)
    {
        $this->transparency = $transparency;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.transparency');
    }
}

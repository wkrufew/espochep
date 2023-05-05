<?php

namespace App\Http\Livewire;

use App\Models\Integrante;
use Livewire\Component;

class SliderIntegrante extends Component
{
    public $integrantes = [];
 
    public function loadSlider()
    {
        $this->integrantes =  Integrante::select(['id', 'nombre', 'cargo', 'url','order'])
                            ->whereNotNull('nombre')
                            ->where('nombre', '!=', '')
                            ->orderBy('order', 'asc')
                            ->get();

        $this->emit('swiper-integrantes');
    }

    public function render()
    {
        return view('livewire.slider-integrante');
    }
}

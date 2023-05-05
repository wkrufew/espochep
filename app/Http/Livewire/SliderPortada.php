<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class SliderPortada extends Component
{
    public $sliders = [];
 
    public function loadSlider()
    {
        /* $this->sliders = cache()->remember('welcome', 60*60*24, function () {
            return  Slider::select(['id', 'title_' . app()->getLocale(), 'subtitle_' . app()->getLocale(),'url_button', 'url_img'])
                            ->whereNotNull('title_' . app()->getLocale())
                            ->where('title_' . app()->getLocale(), '!=', '')
                            ->orderBy('order', 'asc')
                            ->get();
        }); */
        $local=app()->getLocale();
        $this->sliders =  Slider::select(['id', 'title_' . $local, 'subtitle_' . $local,'url_button', 'url_img'])
                            ->whereNotNull('title_' . $local)
                            ->where('title_' . $local, '!=', '')
                            ->orderBy('order', 'asc')
                            ->get();

        $this->emit('swiper');
    }
    public function render()
    {
        return view('livewire.slider-portada');
    }
}

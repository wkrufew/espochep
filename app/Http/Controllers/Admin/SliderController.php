<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'title_es.required' => 'El campo titulo es requerido',
            'title_en.required' => 'El campo titulo en ingles es requerido',
            'title_es.unique' => 'El titulo ya existe', 
            'subtitle_es.required' => 'El campo subtitulo es requerido',    
            'subtitle_en.required' => 'El campo subtitulo en ingles es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
        ];
        $rules = [
            'title_es'=> array('required', 'unique:sliders'),
            'title_en'=> array('required'),
            'subtitle_es'=> array('required'),
            'subtitle_en'=> array('required'),
            'file'=>array('image', 'nullable'),
        ];
        
        $this->validate($request, $rules, $messages);

        $slider = new Slider($request->all());

        if($request->file('file'))
        {
             $url_img = Storage::put('sliders', $request->file('file'));

             $slider->url_img =  $url_img;
        }
        $slider->order = 1;
        $slider->save();
        
        $notificacion="El slider $request->title_es  se ha añadido correctamente";

        return redirect()->route('admin.sliders.index')->with(compact('notificacion'));
    }


    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $messages = [
            'title_es.required' => 'El campo titulo es requerido',
            'title_es.unique' => 'El titulo ya existe', 
            'subtitle_es.required' => 'El campo subtitulo es requerido',    
            'file.image' => 'El archivo que intentaste subir no es una imagen'
        ];
        $rules = [
            'title_es'=> array('required', 'unique:sliders,title_es,'.$slider->id),
            'title_en'=> array('required'),
            'subtitle_es'=> array('required'),
            'subtitle_en'=> array('required'),
            'file'=>array('image', 'nullable'),
        ];

        $this->validate($request, $rules, $messages);

        if($request->file('file'))
        {
            $url_img = Storage::put('sliders', $request->file('file'));

            if ($slider->url_img) {
                Storage::delete($slider->url_img);

                $slider->url_img =  $url_img;
            }else{
                
                $slider->url_img =  $url_img;
            }
        }
        $slider->update($request->all());

        $notificacion="El slider $slider->title_es  se ha actualizado correctamente";

        return redirect()->route('admin.sliders.index')->with(compact('notificacion'));
    }

    public function destroy(Slider $slider)
    {
        if ($slider->url_img) {
            Storage::delete($slider->url_img);
        }
        
        $slider->delete();
        $notificacion="El slider $slider->title_es se ha eliminado correctamente";

        return redirect()->route('admin.sliders.index')->with(compact('notificacion'));
    }
}

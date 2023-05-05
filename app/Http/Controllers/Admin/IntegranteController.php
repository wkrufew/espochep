<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Integrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntegranteController extends Controller
{
    public function index()
    {
        $integrantes = Integrante::orderBy('order', 'asc')->get();
        return view('admin.integrantes.index', compact('integrantes'));
    }

    public function create()
    {
        return view('admin.integrantes.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo en nombre es requerido',
            'nombre.unique' => 'El nombre ingresado ya existe', 
            'cargo.required' => 'El campo cargo es requerido',    
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.required' => 'Debe elegir una imagen',       
        ];
        $rules = [
            'nombre'=> array('required', 'unique:integrantes'),
            'cargo'=> array('required'),
            'file'=>array('image', 'required'),
        ];
        
        $this->validate($request, $rules, $messages);

        $integrante = new Integrante($request->all());

        if($request->file('file'))
        {
             $url = Storage::put('integrantes', $request->file('file'));

             $integrante->url =  $url;
        }
        $integrante->order = 1;
        $integrante->save();
        
        $notificacion="El integrante $request->nombre  se ha añadido correctamente";

        return redirect()->route('admin.integrantes.index')->with(compact('notificacion'));
    }


    public function edit(Integrante $integrante)
    {
        return view('admin.integrantes.edit', compact('integrante'));
    }

    public function update(Request $request, Integrante $integrante)
    {
        $messages = [
            'nombre.required' => 'El campo en nombre es requerido',
            'nombre.unique' => 'El nombre ingresado ya existe', 
            'cargo.required' => 'El campo cargo es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
        ];
        $rules = [
            'nombre'=> array('required', 'unique:integrantes,nombre,'.$integrante->id),
            'cargo'=> array('required'),
            'file'=>array('image', 'nullable'),
        ];

        $this->validate($request, $rules, $messages);

        if($request->file('file'))
        {
            $url = Storage::put('integrantes', $request->file('file'));

            if ($integrante->url) {
                Storage::delete($integrante->url);

                $integrante->url =  $url;
            }else{
                
                $integrante->url =  $url;
            }
        }
        $integrante->update($request->all());

        $notificacion="El integrante $integrante->nombre  se ha actualizado correctamente";

        return redirect()->route('admin.integrantes.index')->with(compact('notificacion'));
    }

    public function destroy(Integrante $integrante)
    {
        Storage::delete($integrante->url);
        $integrante->delete();
        $notificacion="El integrante $integrante->nombre  se ha eliminado correctamente";

        return redirect()->route('admin.integrantes.index')->with(compact('notificacion'));
    }
}

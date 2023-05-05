<?php

namespace App\Http\Controllers;

use App\Mail\SendProforma;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProcessController extends Controller
{
    public function index()
    {
        return view('processes.index');
    }

    public function show(Process $process) 
    {
        /* $this->authorize('published',$process); */
        $process->load('sections','sections.details','proveedores','moderador:id,name,email');
        return view('processes.show', compact('process'));
    }

    public function apply(Process $process)
    {
        $this->authorize('verifica_doble',$process);
        if (auth()->user()->profile()->exists()) {
            return view('processes.apply', compact('process'));
        }else{
            return back()->with('error', 'Ud aun no tiene sus datos completos, entrar a su perfil y completar la información');
        }
    }

    public function enrolled(Request $request, Process $process)
    {
        /* $this->authorize('verifica_doble',$process); */
        $messages = [
            'monto.required' => 'El campo en monto es requerido',
            'file.required'=>'El campo archivo es requerido',   
            'file.max'=>'El tamaño maximo permitido es 2MB', 
            'file.mimes'=>'Solo se admiten archivos PDF', 
        ];
        $rules = [
            'monto'=> 'required',
            'file'=>'required|file|mimes:pdf|max:2048',
        ];

        $this->validate($request, $rules, $messages);

        $data['moderador'] = $process->moderador->name;
        $data['title'] = $process->title_es;
        $data['code'] = $process->code;
        $data['monto'] = $request->monto;
        $data['nombre'] = auth()->user()->name;
        $data['correo'] = auth()->user()->email;

        if($request->file('file'))
        {
            $original = request()->file('file')->getClientOriginalName();
            $file = request()->file('file')->storeAs('proformas', $original);
        }   
        
        $process->proveedores()->attach(auth()->user()->id, ['monto' => $request->monto, 'cantidad' => $file]);

        Mail::to($process->moderador->email)/* ->cc($moreUsers) */->send(new SendProforma($data));

        return redirect()->route('process.show', $process)->with('exito', 'Aplicó al proceso con éxito');
    }

    public function download(Process $process)
    {
        return response()->download(storage_path('app/public/' . $process->url_file));
    }

    public function return(Process $process)
    {   
        /* $this->authorize('published',$process); */
        return redirect()->route('process.show', $process);
    }
}

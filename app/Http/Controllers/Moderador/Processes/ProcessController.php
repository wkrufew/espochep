<?php

namespace App\Http\Controllers\Moderador\Processes;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Procesos')->only('index', 'show');

        $this->middleware('can:Crear Procesos')->only('create', 'store');

        $this->middleware('can:Actualizar Procesos')->only('edit', 'update');

        $this->middleware('can:Eliminar Procesos')->only('status');
    }

    public function index()
    {
        return view('moderador.processes.index');
    }

    public function create()
    {
        $categories = Purchase::pluck('name_es', 'id'); 
        return view('moderador.processes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_es'=>        'required',
            'title_en'=>        'required',
            'object_es'=>       'required',
            'object_en'=>       'required',
            'description_es'=>  'required',
            'description_en'=>  'required',
            'code'=>            'required',
            'forma_pago_es'=>   'required',
            'forma_pago_en'=>   'required',
            'code'=>            'required',
            'date_end'=>        'required',
            'url_file'=>        'required',
            'slug'=>            'required|unique:processes',
            'purchase_id'=>     'required',
        ]);

        //$process = new Process($request->except('status'));
        $process = Process::create($request->except(['status']));
        /* if($request->file('url_file'))
        {
            $original = request()->file('url_file')->getClientOriginalName();
            $file = request()->file('url_file')->storeAs('processes', $original);
            $process->url_file = $file;
        } */
        //$process->save();
        $notificacion="El Proceso $request->title_es se ha creado correctamente";
        return redirect()->route('moderador.processes.edit',$process)->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        $this->authorize('mod_processes',$process);
        $categories = Purchase::pluck('name_es', 'id'); 
        return view('moderador.processes.edit', compact('process','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {      
        $request->validate([
            'title_es'=>      'required',
            'title_en'=>      'required',
            'object_es'=>     'required',
            'object_en'=>     'required',
            'description_es'=>'required',
            'description_en'=>'required',
            'code'=>          'required',
            'forma_pago_es'=> 'required',
            'forma_pago_en'=> 'required',
            'code'=>          'required',
            'date_end'=>      'required',
            /* 'url_file'=>      'max:2048|mimes:pdf', */
            'url_file'=>      'required',
            'slug'=>          'unique:processes,slug,'.$process->id,
            'purchase_id'=>   'required',
            'status'=>   'required',
        ]);
        
        /* if($request->file('url_file'))
        {
            $original = request()->file('url_file')->getClientOriginalName();
            $file = request()->file('url_file')->storeAs('processes', $original);
            if ($process->url_file) {
                Storage::delete($process->url_file);
                $process->url_file = $file;
            }else{
                $process->url_file = $file;
            }
        }   */       

        /* $process->update([
            'title_es'=>      $request->title_es ,
            'title_en'=>      $request->title_en ,
            'object_es'=>     $request->object_es ,
            'object_en'=>     $request->object_en,
            'description_es'=>$request->description_es,
            'description_en'=>$request->description_en,
            'code'=>          $request->code,
            'forma_pago_es'=> $request->forma_pago_es,
            'forma_pago_en'=> $request->forma_pago_en,
            'code'=>          $request->code,
            'date_end'=>      $request->date_end,
            'email'=>         $request->email,
            'url_file'=>      $process->url_file,
            'slug'=>          $request->slug,
            'purchase_id'=>   $request->purchase_id,
            'status'=>        $request->status,
        ]); */
        $process->update($request->all());
          
        $notificacion="El Proceso $process->title_es se ha actualizado correctamente";
        return redirect()->route('moderador.processes.edit',$process)->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
    }

    public function status(Process $process)
    {
        $process->update([
            'status'=> 6
        ]);

        return redirect()->back()->with('eliminarproceso','ok');
    }

    public function estado(Process $process)
    {
        $process->update([
            'status'=> 5
        ]);

        if ($process->observation) {
            $process->observation->delete();
        }
        
        return redirect()->route('moderador.processes.edit', $process);
    }

    public function observation(Process $process)
    {
        return view('moderador.processes.observation', compact('process'));
    }
}

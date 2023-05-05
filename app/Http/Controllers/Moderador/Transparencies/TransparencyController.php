<?php

namespace App\Http\Controllers\Moderador\Transparencies;

use App\Http\Controllers\Controller;
use App\Models\Transparency;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Transparencia');
    }

    public function index()
    {
        return view('moderador.transparencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moderador.transparencies.create');
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
            'anio'=>        'required'
        ]);

        $transparency = Transparency::create($request->except('status'));

        $notificacion="Los datos generales de Transparencia se han creado correctamente";
        return redirect()->route('moderador.transparencies.edit',$transparency)->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transparency $transparency)
    {
        return view('moderador.transparencies.edit', compact('transparency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transparency $transparency)
    {
        $request->validate([
            'anio'=>        'required',
        ]);

        $transparency->update($request->all());

        $notificacion="Los datos generales de Transparencia se han actualizado correctamente";
        return redirect()->route('moderador.transparencies.edit',$transparency)->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

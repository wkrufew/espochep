<?php

namespace App\Http\Controllers\Moderador\Surrenders;

use App\Http\Controllers\Controller;
use App\Models\Surrender;
use Illuminate\Http\Request;

class SurrenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Rendicion');
    }
    public function index()
    {
        return view('moderador.surrenders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moderador.surrenders.create');
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

        $surrender = Surrender::create($request->except('status'));

        $notificacion="El año de Rendicion de Cuentas se han creado correctamente";
        return redirect()->route('moderador.surrenders.edit',$surrender)->with(compact('notificacion'));
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
    public function edit(Surrender $surrender)
    {
        return view('moderador.surrenders.edit', compact('surrender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surrender $surrender)
    {
        $request->validate([
            'anio'=>        'required'
        ]);

        $surrender->update($request->all());

        $notificacion="El año de Rendicion de Cuentas se han actualizado correctamente";
        return redirect()->route('moderador.surrenders.edit',$surrender)->with(compact('notificacion'));
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

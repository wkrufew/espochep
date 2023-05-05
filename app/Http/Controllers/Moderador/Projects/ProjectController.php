<?php

namespace App\Http\Controllers\Moderador\Projects;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Proyectos')->only('index', 'show');

        $this->middleware('can:Crear Proyectos')->only('create', 'store');

        $this->middleware('can:Actualizar Proyectos')->only('edit', 'update');

        $this->middleware('can:Eliminar Proyectos')->only('status');
    }

    public function index()
    {
        return view('moderador.projects.index');
    }

    public function create()
    {
        return view('moderador.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title_es.required' => 'El campo Titulo es requerido',
            'title_en.required' => 'El campo Titulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description_es.required' => 'El campo descripcion es requerido',
            'description_en.required' => 'El campo descripcion es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen'
        ];
        $rules = [
            'title_es'=> array('required'),
            'title_en'=> array('required'),
            'slug'=> array('required','unique:projects'),
            'description_es'=>array('required'),
            'description_en'=>array('required'),
            'fecha_inicio'=> array('required'),
            'file'=>array('image'),
        ];
        
        $this->validate($request, $rules, $messages);

        $project = Project::create($request->except(['status']));

        if($request->file('file'))
        {
             $url = Storage::put('projects', $request->file('file'));
             $project->image()->create([
                'url' => $url
             ]);
        }
        
        $proyecto = $request->title_es;
        $notificacion="El proyecto $proyecto se ha creado correctamente";
        $notificacion="El Proyecto $request->title_es se ha creado correctamente";
        return redirect()->route('moderador.projects.edit',$project)->with(compact('notificacion'));
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
    public function edit(Project $project)
    {
        return view('moderador.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $messages = [
            'title_es.required' => 'El campo Titulo es requerido',
            'title_en.required' => 'El campo Titulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description_es.required' => 'El campo descripcion es requerido',
            'description_en.required' => 'El campo descripcion es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen'
        ];
        $rules = [
            'title_es'=> array('required'),
            'title_en'=> array('required'),
            'slug'=> array('required','unique:projects,slug,'.$project->id),
            'description_es'=>array('required'),
            'description_en'=>array('required'),
            'fecha_inicio'=> array('required'),
            'file'=>array('image'),
        ];
        
        $this->validate($request, $rules, $messages);

        $project->update($request->all());

        if($request->file('file'))
        {
            $url = Storage::put('projects', $request->file('file'));

            if ($project->image) {
                Storage::delete($project->image->url);

                $project->image->update([
                    'url' => $url
                ]);
            }else{
                $project->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('moderador.projects.index');
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

    //para eliminar osea cambiar de estado el proyecto
    public function status(Project $project)
    {
        $project->status = 4;
        $project->save();

        return back()->with('eliminarproyecto','ok');
    }
}

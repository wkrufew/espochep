<?php

namespace App\Http\Controllers\Moderador\Notices;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Noticias');
    }
    public function index()
    {
        return view('moderador.notices.index');
    }

    public function create()
    {
        $categories = Category::pluck('name_es', 'id'); 
        return view('moderador.notices.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'title_es.required' => 'El campo Titulo es requerido',
            'title_en.required' => 'El campo Titulo es requerido',
            'subtitle_es.required' => 'El capo subtitulo es requerido',
            'subtitle_en.required' => 'El capo subtitulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description_es.required' => 'El campo descripcion es requerido',
            'description_en.required' => 'El campo descripcion es requerido',
            'category_id.required' => 'Debe seleccionar una categoria',
            'file.image' => 'El archivo que intentaste subir no es una imagen'
        ];
        $rules = [
            'title_es'=> array('required'),
            'title_en'=> array('required'),
            'subtitle_es'=>array('required'),
            'subtitle_en'=>array('required'),
            'slug'=> array('required','unique:notices'),
            'description_es'=>array('required'),
            'description_en'=>array('required'),
            'category_id'=> array('required'),
            'file'=>array('image'),
        ];
        
        $this->validate($request, $rules, $messages);
        
        $notice = Notice::create($request->except(['status']));

        if($request->file('file'))
        {
             $url = Storage::put('notices', $request->file('file'));
             $notice->image()->create([
                'url' => $url
             ]);
        }
        
        $noticia = $request->title_es;
        $notificacion="La noticia $noticia se ha creado correctamente";

        return redirect()->route('moderador.notices.index')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('moderador.notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //$this->authorize('dicatated',$notice);

        $categories = Category::pluck('name_es', 'id');

        return view('moderador.notices.edit', compact('notice', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //$this->authorize('dicatated',$notice);
        $messages = [
            'title_es.required' => 'El campo Titulo es requerido',
            'title_en.required' => 'El campo Titulo es requerido',
            'subtitle_es.required' => 'El capo subtitulo es requerido',
            'subtitle_en.required' => 'El capo subtitulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description_es.required' => 'El campo descripcion es requerido',
            'description_en.required' => 'El campo descripcion es requerido',
            'category_id.required' => 'Debe seleccionar una categoria',
            'file.image' => 'El archivo que intentaste subir no es una imagen'
        ];
        $rules = [
            'title_es'=> array('required'),
            'title_en'=> array('required'),
            'subtitle_es'=>array('required'),
            'subtitle_en'=>array('required'),
            'slug'=> array('required','unique:notices,slug,'.$notice->id),
            'description_es'=>array('required'),
            'description_en'=>array('required'),
            'category_id'=> array('required'),
            'file'=>array('image'),
        ];
        
        $this->validate($request, $rules, $messages);

        $notice->update($request->all());

        if($request->file('file'))
        {
            $url = Storage::put('notices', $request->file('file'));

            if ($notice->image) {
                Storage::delete($notice->image->url);

                $notice->image->update([
                    'url' => $url
                ]);
            }else{
                $notice->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('moderador.notices.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
    }

    public function status(Notice $notice)
    {
        $notice->status = 3;
        $notice->save();

        return back()->with('eliminarnoticia','ok');
    }
}

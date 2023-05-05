<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name_es.required' => 'El campo en español es requerido',
            'name_en.unique' => 'La categoria ingresada ya existe', 
            'name_es.required' => 'El campo en ingles es requerido',           
        ];
        $rules = [
            'name_es'=> array('required', 'unique:categories'),
            'name_en'=> array('required'),
        ];
        
        $this->validate($request, $rules, $messages);

        $category = Category::create($request->all());
        
        $notificacion="La categoria $request->name_es  se ha añadido correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $messages = [
            'name_es.required' => 'El campo en español es requerido',
            'name_es.unique' => 'La categoria ingresada ya existe', 
            'name_es.required' => 'El campo en ingles es requerido',
        ];
        $rules = [
            'name_es'=> array('required', 'unique:categories,name_es,'.$category->id),
            'name_en'=> array('required'),
        ];
        
        $this->validate($request, $rules, $messages);

        $category->update($request->all());

        $notificacion="La categoria  $request->name_es  se ha actualizado correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notificacion="La categoria  $category->name_es  se ha eliminado correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));
    }
}

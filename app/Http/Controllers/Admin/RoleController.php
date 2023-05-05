<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Roles')->only('index', 'show');

        $this->middleware('can:Crear Rol')->only('create', 'store');

        $this->middleware('can:Editar Rol')->only('edit', 'update');

        $this->middleware('can:Eliminar Rol')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
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
            'name.required' => 'El campo nombre es requerido',
            'permissions.required' => 'Debe seleccionar al menos un permiso',
        ];
        $rules = [
            'name'=> array('required'),
            'permissions'=>array('required')
        ];
        
        $this->validate($request, $rules, $messages);

        $role = Role::create([
            'name' => $request->name
        ]);
        
        $role->permissions()->attach($request->permissions);
        
        $rol = $request->name;
        $notificacion="El rol $rol se ha añadido correctamente";

        return redirect()->route('admin.roles.index')->with(compact('notificacion'));
    }

    
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

   
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

   
    public function update(Request $request, Role $role)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'permissions.required' => 'Debe seleccionar al menos un permiso',
        ];
        $rules = [
            'name'=> array('required'),
            'permissions'=>array('required')
        ];
        
        $this->validate($request, $rules, $messages);
        
        $role->permissions()->sync($request->permissions);

        $role->update([
            'name' => $request->name
        ]);
   
        $rol = $request->name;
        $notificacion="El rol $rol se ha actualizado correctamente";
        return redirect()->route('admin.roles.index')->with('notificacion',$notificacion);
    }

    
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('notificacion', 'El rol se ha eliminado con correctamente');
    }
}

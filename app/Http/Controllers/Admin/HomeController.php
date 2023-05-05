<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Admin')->only('index');
    }
    public function index()
    {
        $data = [   
                    'usuariosrol' => User::has('roles')->count(),
                    'usuarios' => User::whereDoesntHave('roles')->count(),
                    'procesos' =>  DB::table('processes')->whereNotIn('status', [6])->count(),// DB::table('processes')->where('status', '=!', 6)->get(),
                    'noticias' => DB::table('notices')->whereNotIn('status', [3])->count(),
                    'proyectos' => DB::table('projects')->whereNotIn('status', [4])->count(),
                    'roles' => DB::table('roles')->count(),
                    'integrantes' => DB::table('integrantes')->count(),
                    'revision' => DB::table('processes')->where('status', 5)->count(),
                ];

                //dd($data); 
        return view('admin.index')->with($data);
    }
}

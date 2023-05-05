<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    public function show(Project $project) 
    {
        /* $this->authorize('published',$process); */
        $project->load('fases','moderador:id,name');
        return view('projects.show', compact('project'));
    }
}

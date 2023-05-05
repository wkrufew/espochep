<?php

namespace App\Http\Controllers\Moderador;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Process;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $processes = Process::where('user_id', auth()->user()->id)->whereNotIn('status', [6])->count();
        $notices = Notice::where('user_id', auth()->user()->id)->whereNotIn('status', [3])->count();
        $projects = Project::where('user_id', auth()->user()->id)->whereNotIn('status', [4])->count();

        return view('moderador.dashboard.index', compact('processes','notices','projects'));
    }
}

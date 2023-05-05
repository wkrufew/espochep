<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Mail\ApprovedProcess;
use App\Mail\RechazoProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::where('status', 5)->paginate(10);
        return view('admin.processes.index', compact('processes'));
    }

    public function show(Process $process)
    {
        $this->authorize('revision', $process);

        return view('admin.processes.show', compact('process'));
    }

    public function approved(Process $process)
    {
        //$this->authorize('revision', $process);

        if ($process->sections->count() < 1) {
           /*  $process->status = 1;
            $process->save();
            Mail::to($process->moderador->email)->send(new RechazoProcess($process)); */
            return back()->with('rechazo', 'No se puedo publicar este proceso ya que no se encuentra completa la informacion');
        }

        $process->status = 2;
        $process->save();

        Mail::to($process->moderador->email)->send(new ApprovedProcess($process));

        return redirect()->route('admin.process.index')->with('info', 'El proceso a sido aprobado con exito');
    }

    public function observation(Process $process)
    {
        return view('admin.processes.observation', compact('process'));
    }

    public function reject(Request $request, Process $process)
    {
        $request->validate([
            'body' => 'required'
        ]);
        
        $process->observation()->create($request->all());

        $process->status = 1;
        $process->save();

        Mail::to($process->moderador->email)->send(new RechazoProcess($process));

       return redirect()->route('admin.process.index')->with('rechazo', 'El proceso a sido rechazado');
    }
}

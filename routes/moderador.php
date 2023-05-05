<?php

use App\Http\Controllers\Moderador\HomeController;
use App\Http\Controllers\Moderador\Notices\NoticeController;
use App\Http\Controllers\Moderador\Processes\ProcessController;
use App\Http\Controllers\Moderador\Projects\ProjectController;
use App\Http\Controllers\Moderador\Surrenders\SurrenderController;
use App\Http\Controllers\Moderador\Transparencies\TransparencyController;
use App\Http\Livewire\Moderador\Processes\ProcessesCurriculum;
use App\Http\Livewire\Moderador\Processes\ProcessesProveedor;
use App\Http\Livewire\Moderador\Processes\ProcessesProveedores;
use App\Http\Livewire\Moderador\Projects\ProjectsCurriculum;
use App\Http\Livewire\Moderador\Surrenders\SurrendersStages;
use App\Http\Livewire\Moderador\Transparencies\TransparenciesDetails;
use App\Http\Livewire\Moderador\Transparencies\TransparenciesYears;
use Illuminate\Support\Facades\Route;

//Route::redirect('', 'moderador');

//Route::get('processes', ModeradorProcesses::class)->middleware('can:Listar Procesos')->name('processes.index');

Route::get('', [HomeController::class, 'index'])->middleware('can:Listar Procesos')->name('dashboard.index');

//procesos
Route::resource('processes', ProcessController::class)->names('processes');
Route::get('processes/{process}/curriculum', ProcessesCurriculum::class)->name('processes.curriculum');
Route::get('processes/{process}/proveedores', ProcessesProveedores::class)->name('processes.proveedor');
Route::get('processes/{process}/{proveedor}/proveedor', ProcessesProveedor::class)->name('processes.proveedorperfil');
Route::post('processes/{process}/status', [ProcessController::class, 'status'])->name('processes.eliminar');
Route::post('processes/{process}/estado', [ProcessController::class, 'estado'])->name('processes.status');
Route::get('processes/{process}/observation', [ProcessController::class, 'observation'])->name('processes.observation');
//noticias
Route::resource('notices', NoticeController::class)->names('notices');
Route::post('notices/{notice}/status', [NoticeController::class, 'status'])->name('notices.status');
//proyectos
Route::resource('projects', ProjectController::class)->names('projects');
Route::get('projects/{project}/curriculum', ProjectsCurriculum::class)->name('projects.curriculum');
Route::post('projects/{project}/status', [ProjectController::class, 'status'])->name('projects.eliminar');
//tranparencias
Route::resource('transparencies', TransparencyController::class)->names('transparencies');
Route::get('transparencies/{transparency}/years', TransparenciesYears::class)->name('transparencies.years');
//
//rendicion de cuentas
Route::resource('surrenders', SurrenderController::class)->names('surrenders');
Route::get('surrenders/{surrender}/stages', SurrendersStages::class)->name('surrenders.stages');
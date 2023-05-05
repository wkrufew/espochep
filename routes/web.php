<?php

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SurrenderController;
use App\Http\Controllers\TransparencyController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* Route::get('/localization', Idioma::class)->name('localization'); */

    
Route::get('procesos', [ProcessController::class, 'index'])->name('process.index');

Route::get('procesos/{process}', [ProcessController::class, 'show'])->name('process.show');
Route::get('procesos/{process}/aplicar', [ProcessController::class, 'apply'])->middleware('auth')->name('process.apply');
Route::get('procesos/{process}/return', [ProcessController::class, 'return'])->middleware('auth')->name('process.return');
Route::post('procesos/{process}/enrolled', [ProcessController::class, 'enrolled'])->middleware('auth')->name('process.enrolled');
Route::get('procesos/{process}/download', [ProcessController::class, 'download'])->name('process.download');

////noticias
Route::get('notices', [NoticeController::class, 'index'])->name('notice.index');
Route::get('notices/{notice}', [NoticeController::class, 'show'])->name('notice.show');

////proyectos
Route::get('projects', [ProjectController::class, 'index'])->name('project.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('project.show');

//tranpariencia
Route::get('transparencies', [TransparencyController::class, 'index'])->name('transparency.index');

//rendicion
Route::get('surrenders', [SurrenderController::class, 'index'])->name('surrender.index');

Route::get('/contactanos', function () {
    return view('contact');
})->name('contact');


Route::get('/about', function () {
    return view('about');
})->name('about');

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */







//RUTAS PARA LANZAR EN MODO PRODUCCION EN EL HOSTING COMPARTIDO

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Cache de la app eliminada';
});

 // borrar caché de ruta
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Cache de rutas eliminada';
});

// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Configuracion de cache eliminada';
}); 

// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'Cache de vistas eliminada';
});

// optimmizar cache
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return 'Cache de vistas eliminada';
});

Route::get('storage-link', function () {
    $exitCode = Artisan::call('storage:link');
    return 'Simbolic Link establecido';
});

Route::get('modo-down', function () {
    $exitCode = Artisan::call('down --secret="drpools2022"');
    return 'The system in maintenance mode';
})->name('down');

Route::get('up', function () {
    $exitCode = Artisan::call('up');
    //return 'The system is already active';
    return back()->with('notificacion','System Up');
})->name('up');

//ruta para refrescar la cache de la app
Route::get('/fresh', function() {
    $exitCode = Artisan::call('cache:clear');
    return back()->with('notificacion','System cache is up to date');
})->name('fresh');

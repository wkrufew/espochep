<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IntegranteController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Admin')->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only('index','edit','update')->names('users');

//procesos
Route::get('processes', [ProcessController::class, 'index'])->name('process.index');
Route::get('processes/{process}', [ProcessController::class, 'show'])->name('process.show');
Route::post('processes/{process}/approved', [ProcessController::class, 'approved'])->name('process.approved');
Route::get('processes/{process}/observation', [ProcessController::class, 'observation'])->name('process.observation');
Route::post('processes/{process}/reject', [ProcessController::class, 'reject'])->name('process.reject');

Route::resource('purchases', PurchaseController::class)->except(['show'])->names('purchases');
Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');
Route::resource('integrantes', IntegranteController::class)->except(['show'])->names('integrantes');
Route::resource('settings', SettingController::class)->except(['show'])->names('settings');
Route::resource('sliders', SliderController::class)->except(['show'])->names('sliders');
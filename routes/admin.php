<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;


//ruta al panel admin lte
Route::get('admin', [HomeController::class, 'index'])->name('admin.home');


//ruta de tipo resource PARA las 7 rutas de un crud --> debo crear el Controlador con los 7 metods(del crud)
Route::resource('categories', CategoryController::class)->names('admin.categories');


//ruta de tipo resource PARA las 7 rutas del crud --> debo crear el Controlador con los 7 metods(del crud)
Route::resource('tags', TagController::class)->names('admin.tags');
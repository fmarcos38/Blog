<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//ruta al panel admin lte
Route::get('admin', [HomeController::class, 'index'])->name('admin.home');


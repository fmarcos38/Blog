<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


//ruta principal -->al hacer click en el logo
Route::get('/', [PostController::class, 'index'])->name('posts.index');


//ruta -->al hacer click en el nombre de un post q me dirija al post
Route::get('post/{post}', [PostController::class, 'show'])->name('posts.show');


//ruta filtra por categoría
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');


//ruta para direccionar al hacer click en las etiquetas del post
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');


//ruta dashboard-->una ves logueado
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

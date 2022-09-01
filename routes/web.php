<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/* Al prinicipio lo que se hacía era con la '/', se llamaba a la vista welcome. */
/* Route::get('/', function () {
    return view('welcome');
}); */
//Se llama a la vista principal para que cargue todos los post publicados
Route::get('/', [PostController::class, 'index'])->name('posts.index');

//Al hacer click en un post, que lo muestre
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

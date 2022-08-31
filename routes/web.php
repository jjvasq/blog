<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Al prinicipio lo que se hacía era con la '/', se llamaba a la vista welcome. */
/* Route::get('/', function () {
    return view('welcome');
}); */
//Se llama a la vista principal para que cargue todos los post publicados
Route::get('/', [PostController::class, 'index'])->name('posts.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

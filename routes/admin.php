<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

/**
 * Se crean las 7 rutas automáticas para la creación del CRUD.
 * Se pueden observar las mismas estando parados en el proyecto ('blog')
 * $ php artisan r:l --name=admin.categories
 */
//Le indico que solo cree esas 3 rutas que solo utilizo.
Route::resource('users', UserController::class)->only('index','edit','update')->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

/**
 * Se crean las 7 rutas automáticas para la creación del CRUD.
 * Se pueden observar las mismas estando parados en el proyecto ('blog')
 * $ php artisan r:l --name=admin.categories
 */
Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('tags', TagController::class)->names('admin.tags');
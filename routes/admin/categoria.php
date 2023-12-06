<?php

// MANEJO DE RUTAS PARA LAS CATEGORIAS

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoriaController::class)->group(function () {
    // GET METHODS
    Route::get('categoria', CategoriaController::class)->middleware('auth')->name('categoria');

    // POST METHODS
    Route::post('categoria/create', 'create')->middleware('auth')->name('categoria.create');


    // PUT METHODS
    Route::put('categoria/update/{id}', 'update')->middleware('auth')->name('categoria.update');

    //DELETE METHOD
    Route::delete('categoria/delete/{id}', 'delete')->middleware('auth')->name('categoria.delete');
});

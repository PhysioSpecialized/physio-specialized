<?php

// MANEJO DE RUTAS PARA LAS CATEGORIAS

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoriaController::class)->group(function () {
    // GET METHODS
    Route::get('categoria', CategoriaController::class)->name('categoria');

    // POST METHODS
    Route::post('categoria/create', 'create')->name('categoria.create');


    // PUT METHODS
    Route::put('categoria/update/{id}', 'update')->name('categoria.update');

    //DELETE METHOD
    Route::delete('categoria/delete/{id}', 'delete')->name('categoria.delete');

});

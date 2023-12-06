<?php


use App\Http\Controllers\EjercicioController;
use Illuminate\Support\Facades\Route;

Route::controller(EjercicioController::class)->group(function () {
    // GET METHODS
    Route::get('ejercicio', EjercicioController::class)->middleware('auth')->name('ejercicio');

    // POST METHODS
    Route::post('ejercicio/create', 'create')->middleware('auth')->name('ejercicio.create');

    // PUT METHODS
    Route::put('ejercicio/update/{id}', 'update')->middleware('auth')->name('ejercicio.update');

    //DELETE METHOD
    Route::delete('ejercicio/delete/{id}', 'delete')->middleware('auth')->name('ejercicio.delete');
});

<?php


use App\Http\Controllers\EjercicioController;
use Illuminate\Support\Facades\Route;

Route::controller(EjercicioController::class)->group(function () {
    // GET METHODS
    Route::get('ejercicio', EjercicioController::class)->name('ejercicio');

    // POST METHODS
    Route::post('ejercicio/create', 'create')->name('ejercicio.create');

    // PUT METHODS
    Route::put('ejercicio/update/{id}', 'update')->name('ejercicio.update');

    //DELETE METHOD
    Route::delete('ejercicio/delete/{id}', 'delete')->name('ejercicio.delete');


});





<?php

use App\Http\Controllers\ContenidoController;
use Illuminate\Support\Facades\Route;

Route::controller(ContenidoController::class)->group(function () {
    // GET METHODS
    Route::get('ejercicio/archivos', 'mostrarArchivos')->middleware('auth')->name('archivos');

    //POST METHODS
    Route::post('subir-archivo', 'subirArchivo')->middleware('auth')->name('subir-archivo');

    //DELETE METHODS
    Route::delete('eliminar-archivo/{id_contenido}', 'eliminarArchivo')->middleware('auth')->name('eliminar-archivo');
});

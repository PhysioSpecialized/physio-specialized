<?php

use App\Http\Controllers\ContenidoController;
use Illuminate\Support\Facades\Route;

Route::controller(ContenidoController::class)->group(function () {
    // GET METHODS
    Route::get('ejercicio/archivos', 'mostrarArchivos')->name('archivos');

    //POST METHODS
    Route::post('subir-archivo', 'subirArchivo')->name('subir-archivo');

    //DELETE METHODS
    Route::delete('eliminar-archivo/{id_contenido}', 'eliminarArchivo')->name('eliminar-archivo');

});
<?php

use App\Http\Controllers\PdfsController;
use Illuminate\Support\Facades\Route;


Route::controller(PdfsController::class)->group(function () {

    // GET METHODS
    Route::get('pdfs/{id}', 'GetFilesByCategory')->middleware('auth')->name('pdf.getByCategory');


    // POSTS METHODS
    Route::post('pdfs/{id}', 'subirPDF')->middleware('auth')->name('pdf.subirPDF');

    // DELETE METHOD
    Route::delete('pdfs/{id}', 'eliminarPDF')->middleware('auth')->name('pdf.delete');
});

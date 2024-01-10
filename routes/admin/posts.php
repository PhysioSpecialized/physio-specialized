<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::controller(PostsController::class)->group(function () {
    // GET METHODS
    Route::get('posts/covid', 'postsCovid')->middleware('auth')->name('posts.covid');

    // POST METHOS
    Route::post('posts/create', 'Create')->middleware('auth')->name('posts.create');
});

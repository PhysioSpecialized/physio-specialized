<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::controller(PostsController::class)->group(function () {
    // GET METHODS
    Route::get('posts/covid', 'postsCovid')->name('posts.covid');
    Route::get('covid', 'PrincipalCovid')->name('covid');
    Route::get('posts/{id}', 'verPosts')->name('posts.ver');

    // POST METHOS
    Route::post('posts/create', 'Create')->middleware('auth')->name('posts.create');

    // PUT METHODS
    Route::put('posts/update/{id}', 'update')->middleware('auth')->name('posts.update');


    //DELETE METHOD
    Route::delete('posts/delete/{id}', 'delete')->middleware('auth')->name('posts.delete');
});

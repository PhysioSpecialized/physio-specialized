<?php

use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'mostrarLanding'])->name('principal');

Route::get('/acceder', function () {
    return view('login');
})->name('acceder');

Route::get('/ejercicios/ver/{id}', [EjercicioController::class, 'verEjercicios'])->name('ejercicios');


Route::get('/dashboard', [PrincipalController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/update/{id}', [PerfilController::class, 'update'])->name('perfil.update');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin/categoria.php';
require __DIR__ . '/admin/ejercicio.php';
require __DIR__ . '/admin/contenido.php';
require __DIR__ . '/admin/posts.php';
require __DIR__ . '/admin/pdfs.php';

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ContenidoEjercicio;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function mostrarLanding()
    {
        $categorias = Categoria::all();

        return view('principal.landingPage', compact('categorias'));
    }


    public function dashboard()
{
    $categorias = Categoria::all();
    $ejercicios = Ejercicio::with('archivos')->get();
    $archivos = ContenidoEjercicio::all();

    return view('dashboard', compact('categorias', 'ejercicios', 'archivos'));
}

}

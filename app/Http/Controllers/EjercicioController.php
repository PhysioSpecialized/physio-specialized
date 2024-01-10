<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ejercicio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EjercicioController extends Controller
{

    public function __invoke()
    {
        $ejercicios = Ejercicio::all();

        //categorias de la db

        $categorias = Categoria::all()->pluck('nombre_categoria', 'id_categoria');

        return view('ejercicios.index', compact('ejercicios', 'categorias'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'id_categoria' => 'required',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $id_categoria = $request->input('id_categoria');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        // Verificar si ya existe un ejercicio con el mismo nombre
        $existingExercise = Ejercicio::where('nombre', $nombre)->first();

        if ($existingExercise) {
            return redirect()->route('ejercicio')->with('error', 'El nombre del ejercicio ya existe.');
        }

        try {
            Ejercicio::create([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'id_categoria' => $id_categoria,

            ]);
        } catch (QueryException $e) {
            return redirect()->route('ejercicio')->with('error', 'Error en el servidor');
        }

        return redirect()->route('ejercicio')->with('success', 'Ejercicio agregado con éxito.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_categoria' => 'required',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $id_categoria = $request->input('id_categoria');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        try {
            $ejercicio = Ejercicio::findOrFail($id);

            $existingExercise = Ejercicio::where('nombre', $nombre)->where('id_ejercicio', '!=', $id)->first();

            if ($existingExercise) {
                return redirect()->route('ejercicio')->with('error', 'El nombre del ejercicio ya existe.');
            }

            $ejercicio->update([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'id_categoria' => $id_categoria,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('ejercicio')->with('error', 'Error en el servidor');
        }

        return redirect()->route('ejercicio')->with('success', 'Ejercicio actualizado con éxito.');
    }




    public function delete($id)
    {
        try {
            $ejercicio = Ejercicio::findOrFail($id);
            $ejercicio->delete();

            return response()->json(['success' => true, 'message' => 'Ejercicio eliminado con éxito.']);
        } catch (\Exception $e) {

            return response()->json(['success' => false, 'message' => 'Error en el servidor']);
        }
    }





    public function verEjercicios(string $id)
    {


        try {

            $categoria = Categoria::find($id);

            if (!$categoria) {
                return redirect()->back()->with('error', 'Ha ocurrido un error. No se pudo realizar la operación.');
            }


            $ejercicios = Ejercicio::where('id_categoria', $id)->get();
            return view('principal.ejercicios', compact('categoria', 'ejercicios'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('/')->with('error', 'Error al cargar la página');
        }
    }
}

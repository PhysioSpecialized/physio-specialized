<?php

namespace App\Http\Controllers;

use App\Models\ContenidoEjercicio;
use App\Models\Ejercicio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContenidoController extends Controller
{
    public function mostrarArchivos()
    {
        $ejercicios = Ejercicio::with('archivos')->get();

        $ejercicioDisp = Ejercicio::all()->pluck('nombre', 'id_ejercicio');



        return view('ejercicios.archivos', compact('ejercicios', 'ejercicioDisp'));
    }


    public function subirArchivo(Request $request)
    {
    $request->validate([
        'id_ejercicio' => 'required|exists:ejercicios,id_ejercicio',
        'files' => 'required|mimes:pdf,mp4,jpg,png,jpeg',
    ]);

    $id_ejercicio = $request->input('id_ejercicio');

    $archivo = $request->file('files');

    $nombre_ejercicio = Ejercicio::find($id_ejercicio)->nombre;
    $nombre_ejercicio = str_replace(' ', '_', $nombre_ejercicio);

    $nombre_archivo = $nombre_ejercicio . '_' . time() . '.' . $archivo->getClientOriginalExtension();

    $extension = $archivo->getClientOriginalExtension();

    $archivoPath = $archivo->storeAs('archivos', $nombre_archivo, 'public');

    try {

        ContenidoEjercicio::create([
        'contenido_path' => $archivoPath,
        'id_ejercicio' => $id_ejercicio,
        'tipo_contenido' => $extension,
    ]);

    } catch (QueryException $e) {

        return redirect()->route('archivos')->with('error', 'Error al subir el archivo, verifica que todo este correcto');
    }

    return redirect()->route('archivos')->with('success', 'Archivo subido exitosamente.');
    }


    public function eliminarArchivo($id_contenido)
    {
    try {
        $contenido = ContenidoEjercicio::findOrFail($id_contenido);

        Storage::delete($contenido->contenido_path);

        $contenido->delete();

        return response()->json(['success' => true, 'message' => 'Archivo eliminado exitosamente.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error en el servidor']);
    }
    }


}

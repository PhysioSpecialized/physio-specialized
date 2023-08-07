<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Dotenv\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __invoke()
    {
        return view('categoria.index');
    }

    public function create(Request $request)
    {

        // Validar los campos del formulario
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
            'color_encabezado' => 'required|string|max:7',
            'img_path' => 'image|mimes:jpeg,png,jpg,gif|max:30000'
        ]);

        // Si la validación es exitosa, proceder con las acciones necesarias
        $nombre = $request->input('nombre_categoria');
        $color_encabezado = $request->input('color_encabezado');
        $img_path = null;

        try {
            // Insertar los datos en la tabla usando el modelo Categoria
            Categoria::create([
                'nombre_categoria' => $nombre,
                'color_encabezado' => $color_encabezado,
                'img_path' => $img_path,
            ]);

            // Obtener el archivo de la imagen
            if ($request->hasFile('img_path')) {
                $archivo_imagen = $request->file('img_path');
                // Reemplazar espacios por guiones bajos en el nombre de la categoría
                $nombre_categoria = str_replace(' ', '_', $nombre);
                // Obtener la extensión del archivo
                $extension = $archivo_imagen->getClientOriginalExtension();

                // Generar el nombre del archivo usando el nombre de la categoría y la extensión
                $nombre_archivo = $nombre_categoria . '.' . $extension;

                // Guardar la imagen con el nombre de la categoría
                $archivo_imagen->storeAs('uploads/img', $nombre_archivo); // Ajusta la ruta del directorio donde deseas almacenar la imagen
                $img_path =  'uploads/img/' . $nombre_archivo;
            }
        } catch (QueryException $e) {
            // Capturar la excepción de clave duplicada
            if ($e->getCode() === '23000') {
                return redirect()->route('categoria')->with('error', 'La categoría ya existe en la base de datos.');
            }
            // Si se produce otra excepción, puedes manejarla aquí
            // return redirect()->route('formulario')->with('error', 'Otro mensaje de error.');
        }

        return redirect()->route('categoria')->with('success', 'Categoria agregada con éxito.');
    }
}

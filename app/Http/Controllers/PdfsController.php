<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PdfsController extends Controller
{

    public function GetFilesByCategory($idCategoria)
    {
        // Obtener la lista de archivos PDF de la categoría desde la base de datos
        $archivosPDF = Pdf::where('post_id', $idCategoria)->get();

        // Devolver la respuesta en formato JSON
        return response()->json(['data' => $archivosPDF]);
    }

    public function eliminarPDF($id)
    {
        // Busca el PDF por ID en la base de datos
        $pdf = Pdf::find($id);
        // Verifica si el PDF existe
        if ($pdf) {
            // Elimina el PDF del almacenamiento
            $rutaArchivo = 'public/pdfs/' . $pdf->nombre_archivo;

            Storage::delete($rutaArchivo);

            // Elimina el registro de la base de datos
            $pdf->delete();

            // Devuelve una respuesta JSON indicando éxito
            return response()->json(['success' => true, 'message' => 'PDF eliminado correctamente']);
        } else {
            // Devuelve una respuesta JSON indicando que el PDF no se encontró
            return response()->json(['success' => false, 'message' => 'PDF no encontrado']);
        }
    }

    public function subirPDF(Request $request, $id)
    {
        try {

            // Validar que se haya enviado un archivo PDF
            $validator = Validator::make($request->all(), [
                'pdf' => 'required|mimes:pdf|max:10240', // Archivo PDF, tamaño máximo de 10MB
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Por favor, sube un archivo PDF válido (máximo 10MB).',
                ]);
            }

            $directorioPDFs = 'public/pdfs';
            if (!File::exists($directorioPDFs)) {
                File::makeDirectory($directorioPDFs, 0775, true);
            }

            $archivoPDF = $request->file('pdf');

            $post = Post::find($id);

            // Genera un nombre único para el archivo PDF
            $nombreArchivo = time() . "_posts_" . $id . ".pdf";

            // Mueve el archivo al directorio de almacenamiento
            Storage::putFileAs($directorioPDFs, $archivoPDF, $nombreArchivo);

            // Puedes guardar la información del PDF en la base de datos si es necesario
            $pdf = Pdf::create([
                'post_id' => $id,
                'nombre_archivo' => $nombreArchivo,
                "url" => $nombreArchivo
                // Otros campos del modelo PDF si los tienes
            ]);


            return response()->json([
                'success' => true,
                'message' => 'El PDF se subió correctamente.',
                'url' => asset('storage/' . $directorioPDFs . '/' . $nombreArchivo),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al subir el PDF. ' . $e->getMessage(),
            ]);
        }
    }
}

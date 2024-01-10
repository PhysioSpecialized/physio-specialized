<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{

    public function PrincipalCovid()
    {
        $publicaciones = Post::where('categoria', 'covid')->get();

        return view('principal.covid', compact('publicaciones'));
    }

    public function postsCovid()
    {
        $publicaciones = Post::where('categoria', 'covid')->get();

        return view('posts.index', compact('publicaciones'));
    }

    public function Create(Request $request)
    {

        $categoria = $request->input('categoria');
        $titulo = $request->input('titulo');
        $contenido = $request->input('contenido');
        $descripcion = $request->input('descripcion');
        $vista = $request->input('vista');

        try {
            Post::create([
                'titulo' => $titulo,
                'contenido' => $contenido,
                'categoria' => $categoria,
                'descripcion' => $descripcion
            ]);
        } catch (\Throwable $th) {
            return redirect()->route($vista)->with('error', 'Error en el servidor');
        }

        return redirect()->route($vista)->with('success', 'Publicación agregada con éxito.');
    }

    public function verPosts(int $id)
    {
        try {

            $publicacion = Post::find($id);

            if (!$publicacion) {
                return redirect()->back()->with('error', 'Ha ocurrido un error. No se pudo realizar la operación.');
            }

            return view('principal.posts', compact('publicacion',));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error al cargar la página');
        }
    }

    public function delete($id)
    {
        try {
            $publicacion = Post::findOrFail($id);
            $publicacion->delete();

            return response()->json(['success' => true, 'message' => 'La publicación fue eliminada con éxito.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error en el servidor']);
        }
    }

    public function update(Request $request, $id)
    {

        $categoria = $request->input('categoria');
        $titulo = $request->input('tituloEdit');
        $contenido = $request->input('contenidoEdit');
        $descripcion = $request->input('descripcion');
        $vista = $request->input('vista');

        try {
            $publicacion = Post::findOrFail($id);

            $publicacionExiste = Post::where('titulo', $titulo)->where('id', '!=', $id)->first();

            if ($publicacionExiste) {
                return redirect()->route('ejercicio')->with('error', 'Esta publicación ya existe.');
            }

            $publicacion->update([
                'titulo' => $titulo,
                'contenido' => $contenido,
                'categoria' => $categoria,
                'descripcion' => $descripcion
            ]);
        } catch (\Exception $e) {
            echo ($e->getMessage());
            exit();
            return redirect()->route($vista)->with('error', 'Error en el servidor');
        }

        return redirect()->route($vista)->with('success', 'Publicación actualizada con éxito.');
    }
}

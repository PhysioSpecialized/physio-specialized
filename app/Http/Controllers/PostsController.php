<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

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
        $vista = $request->input('vista');

        try {
            Post::create([
                'titulo' => $titulo,
                'contenido' => $contenido,
                'categoria' => $categoria,

            ]);
        } catch (\Throwable $th) {
            return redirect()->route($vista)->with('error', 'Error en el servidor');
        }

        return redirect()->route($vista)->with('success', 'Publicación agregada con éxito.');
    }
}

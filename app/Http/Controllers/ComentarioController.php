<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        // Devuelve todos los comentarios
        $comentarios = Comentario::all();
        return response()->json($comentarios);
    }

    
    public function store(Request $request)
    {
        // Validación básica de datos
        $request->validate([
            'articulo_id' => 'required|exists:articulos,id',
            'contenido' => 'required|string',
        ]);

        // Crear un nuevo comentario
        $comentario = Comentario::create([
            'articulo_id' => $request->articulo_id,
            'contenido' => $request->contenido,
        ]);

        return response()->json($comentario, 201); // Respuesta de creación exitosa
    }

    
    public function show(string $id)
    {
        // Mostrar un comentario específico por ID
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        return response()->json($comentario);
    }

    
    public function articleComments(string $articleId)
    {
        // Obtener todos los comentarios de un artículo específico
        $articulo = Articulo::find($articleId);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        $comentarios = $articulo->comentarios;
        return response()->json($comentarios);
    }

    
    public function update(Request $request, string $id)
    {
        // Validación básica de datos
        $request->validate([
            'contenido' => 'required|string',
        ]);

        // Buscar el comentario
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        // Actualizar comentario
        $comentario->update([
            'contenido' => $request->contenido,
        ]);

        return response()->json($comentario);
    }

    public function destroy(string $id)
    {
        // Buscar el comentario por el id
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        // Eliminar comentario
        $comentario->delete();

        return response()->json(['message' => 'Comentario eliminado exitosamente']);
    }
}

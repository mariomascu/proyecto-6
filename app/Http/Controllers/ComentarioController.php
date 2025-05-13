<?php

namespace App\Http\Controllers;

use App\Models\Comentario; // Asegúrate de tener el modelo Comentario
use App\Models\Articulo;   // Si necesitas relacionarlo con artículos
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Devuelve todos los comentarios
        $comentarios = Comentario::all();
        return response()->json($comentarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación básica de datos
        $request->validate([
            'articulo_id' => 'required|exists:articulos,id', // Asegúrate de que el artículo exista
            'contenido' => 'required|string',
        ]);

        // Crear un nuevo comentario
        $comentario = Comentario::create([
            'articulo_id' => $request->articulo_id,
            'contenido' => $request->contenido,
        ]);

        return response()->json($comentario, 201); // Respuesta de creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un comentario específico por ID
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        return response()->json($comentario);
    }

    /**
     * Display all comments for a specific article.
     */
    public function articleComments(string $articleId)
    {
        // Obtener todos los comentarios de un artículo específico
        $articulo = Articulo::find($articleId);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        $comentarios = $articulo->comentarios; // Suponiendo que tienes una relación definida en el modelo Articulo
        return response()->json($comentarios);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el comentario
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        // Eliminar comentario
        $comentario->delete();

        return response()->json(['message' => 'Comentario eliminado exitosamente']);
    }
}

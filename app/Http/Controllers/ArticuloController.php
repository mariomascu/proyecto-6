<?php

namespace App\Http\Controllers;

use App\Models\Articulo; // Asegúrate de tener el modelo Articulo
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Devuelve todos los artículos
        $articulos = Articulo::all();
        return response()->json($articulos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación básica de datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        // Crear un nuevo artículo
        $articulo = Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        return response()->json($articulo, 201); // Respuesta de creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un artículo específico por ID
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        return response()->json($articulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación básica de datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        // Buscar el artículo
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        // Actualizar artículo
        $articulo->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        return response()->json($articulo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el artículo
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        // Eliminar artículo
        $articulo->delete();

        return response()->json(['message' => 'Artículo eliminado exitosamente']);
    }
}

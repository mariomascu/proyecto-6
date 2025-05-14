<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    
    public function index()
    {
        // Devuelve todos los artículos
        $articulos = Articulo::all();
        return response()->json($articulos);
    }

    
    public function store(Request $request)
    {
        // Validación básica de datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
        ]);

        // Crear un nuevo artículo
        $articulo = Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'autor' => $request->autor,
        ]);

        return response()->json($articulo, 201);
    }

    
    public function show(string $id)
    {
        // Mostrar un artículo específico por ID
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }

        return response()->json($articulo);
    }

    
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

<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        return response()->json(Comentario::all());
    }

    public function store(Request $request)
    {
        $comentario = Comentario::create($request->all());
        return response()->json($comentario, 201);
    }

    public function show($id)
    {
        return response()->json(Comentario::where('id', (int)$id)->first());
    }

    public function comentariosArticulo($id)
    {
        $articulo = Articulo::with('comentarios')->find($id);

        if (!$articulo) {
            return response()->json(['error' => 'Artículo no encontrado'], 404);
        }

        return response()->json($articulo->comentarios);
    }

    public function update(Request $request, $id)
    {        
        $comentario = Comentario::find($id);
        if ($comentario) {
            $comentario->update($request->all());
            return response()->json(['message' => 'Comentario modificado']);
        } else {
            return response()->json(['error' => 'Comentario no modificado'], 404);
        }
    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        if ($comentario) {
            $comentario->delete();
            return response()->json(['message' => 'Comentario eliminado']);
        } else {
            return response()->json(['error' => 'Comentario no encontrado'], 404);
        }
    }
}
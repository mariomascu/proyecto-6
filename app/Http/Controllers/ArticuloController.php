<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticuloController extends Controller
{
    public function index()
    {
        return response()->json(Articulo::all());
    }

    public function store(Request $request)
    {
        $articulo = Articulo::create($request->all());
        return response()->json($articulo, 201);
    }

    public function show($id)
    {
        return response()->json(Articulo::where('id', (int)$id)->first());
    }

    public function update(Request $request, $id)
    {        
        $articulo = Articulo::find($id);
        if ($articulo) {
            $articulo->update($request->all());
            return response()->json(['message' => 'Articulo modificado']);
        } else {
            return response()->json(['error' => 'Articulo no modificado'], 404);
        }
    }

    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        if ($articulo) {
            $articulo->delete();
            return response()->json(['message' => 'Articulo eliminado']);
        } else {
            return response()->json(['error' => 'Articulo no encontrado'], 404);
        }
    }
}
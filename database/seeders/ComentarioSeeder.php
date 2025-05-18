<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        $articulos = Articulo::all();
        
        foreach ($articulos as $articulo) {
            for ($i = 1; $i <= 5; $i++) {
                Comentario::create([
                    'contenido' => "Este es el comentario $i para el artículo '{$articulo->titulo}'",
                    'autor' => "Usuario $i",
                    'articulo_id' => $articulo->id,
                ]);
            }
        }
    }
}
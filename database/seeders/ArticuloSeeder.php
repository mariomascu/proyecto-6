<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticuloSeeder extends Seeder
{
    public function run()
    {
        $articulos = [
            [
                'titulo' => 'Introducción a Laravel',
                'contenido' => 'Laravel es un framework PHP moderno y elegante...',
                'autor' => 'Carlos Pérez'
            ],
            [
                'titulo' => 'Desarrollo de APIs RESTful',
                'contenido' => 'Crear APIs con Laravel es sencillo gracias a...',
                'autor' => 'Ana Gómez'
            ],
            // Añade más artículos según necesites
        ];

        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
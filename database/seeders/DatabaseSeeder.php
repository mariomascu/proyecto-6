<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primero crear los artículos
        $this->call(ArticuloSeeder::class);
        
        // Luego crear los comentarios para esos artículos
        $this->call(ComentarioSeeder::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //crea la migración
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->timestamp('fecha_publicacion');
            $table->string('autor');
        });
    }

    //crea un rollback de la migración
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};

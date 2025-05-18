<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('welcome');
});

/* Rutas para Artículos */
Route::controller(ArticuloController::class)->group(function () {
    Route::get('articulos', 'index');           // Ver todos los artículos (GET)
    Route::get('articulos/{id}', 'show');         // Ver un artículo específico (GET)
    Route::post('articulos', 'store');            // Crear un nuevo artículo (POST)
    Route::put('articulos/{id}', 'update');         // Editar un artículo existente (PUT)
    Route::delete('articulos/{id}', 'destroy');     // Borrar un artículo (DELETE)
});

/* Rutas para Comentarios */
Route::controller(ComentarioController::class)->group(function () {
    Route::get('comentarios', 'index');                                 // Ver todos los comentarios (GET)
    Route::get('comentarios/{id}', 'show');                               // Ver un comentario específico (GET)
    Route::get('articulos/{articleId}/comentarios', 'comentariosArticulo'); // Ver todos los comentarios de un artículo específico (GET)
    Route::post('comentarios', 'store');                                  // Agregar un nuevo comentario (POST)
    Route::put('comentarios/{id}', 'update');                             // Editar un comentario existente (PUT)
    Route::delete('comentarios/{id}', 'destroy');                         // Borrar un comentario (DELETE)
});
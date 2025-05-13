<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;


Route::get('/', function () {
    return view('welcome');
});

// Rutas para los artículos
Route::get('articulos', [ArticuloController::class, 'index']); // 1. Ver todos los artículos (GET)
Route::get('articulos/{id}', [ArticuloController::class, 'show']); // 2. Ver un artículo específico (GET)
Route::post('articulos', [ArticuloController::class, 'store']); // 3. Crear un nuevo artículo (POST)
Route::put('articulos/{id}', [ArticuloController::class, 'update']); // 4. Editar un artículo existente (PUT)
Route::delete('articulos/{id}', [ArticuloController::class, 'destroy']); // 5. Borrar un artículo (DELETE)

// Rutas para los comentarios
Route::get('comentarios', [ComentarioController::class, 'index']); // 6. Ver todos los comentarios (GET)
Route::get('comentarios/{id}', [ComentarioController::class, 'show']); // 7. Ver un comentario específico (GET)
Route::get('articulos/{articleId}/comentarios', [ComentarioController::class, 'articleComments']); // 8. Ver todos los comentarios de un artículo específico (GET)
Route::post('comentarios', [ComentarioController::class, 'store']); // 9. Agregar un nuevo comentario (POST)
Route::put('comentarios/{id}', [ComentarioController::class, 'update']); // 10. Editar un comentario existente (PUT)
Route::delete('comentarios/{id}', [ComentarioController::class, 'destroy']); // 11. Borrar un comentario (DELETE)

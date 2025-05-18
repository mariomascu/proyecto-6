<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articulo extends Model
{
    protected $fillable = [
        'titulo',
        'contenido',
        'fecha_publicacion',
        'autor'
    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
    ];

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
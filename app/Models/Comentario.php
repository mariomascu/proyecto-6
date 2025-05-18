<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $fillable = [
        'contenido',
        'fecha_publicacion',
        'autor',
        'articulo_id'
    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
    ];

    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class);
    }
}
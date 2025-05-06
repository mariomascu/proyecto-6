<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contenido',
        'fecha_publicacion',
        'autor',
        'articulo_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'fecha_publicacion' => 'datetime',
    ];

    /**
     * Get the article that owns the comment.
     */
    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class);
    }
}

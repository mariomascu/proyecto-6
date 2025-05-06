<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articulo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'contenido',
        'fecha_publicacion',
        'autor'
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
     * Get the comments for the article.
     */
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}

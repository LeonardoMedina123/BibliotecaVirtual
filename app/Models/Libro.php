<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id_libros';
    protected $fillable = ['titulo', 'autor', 'editorial', 'portada_url', 'Categorias_id_categorias'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'Categorias_id_categorias', 'id_categorias');
    }
}

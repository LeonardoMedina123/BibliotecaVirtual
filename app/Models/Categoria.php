<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // 1. Le indicamos a Laravel el nombre real de tu tabla en MySQL
    protected $table = 'categorias';

    // 2. CRUCIAL: Le decimos cuál es tu llave primaria personalizada
    protected $primaryKey = 'id_categorias';

    // Relación con los libros (opcional, para tu vista categoria.blade.php)
    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_categorias', 'id_categorias');
    }
}
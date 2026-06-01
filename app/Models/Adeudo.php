<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adeudo extends Model
{
    protected $table = 'adeudos';
    protected $primaryKey = 'id_adeudos';

    protected $fillable = [
        'fecha_limite',
        'Libros_id_libros',
        'Usuarios_id_usuario'
    ];

    public function libro()
    {
        return $this->belongsTo(
            Libro::class,
            'Libros_id_libros',
            'id_libros'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'Usuarios_id_usuario',
            'id_usuario'
        );
    }
}
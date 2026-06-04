<?php

namespace App\Http\Controllers;

use App\Models\Categoria; // Asegúrate de tener tu modelo Categoria creado
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    // Muestra todas las categorías (Tu vista actual)
    public function index() 
    {
        $usuario = Auth::user(); // Obtiene el usuario logueado dinámicamente
        $categorias = Categoria::all(); // Trae las categorías de MySQL

        return view('dashboard', compact('usuario', 'categorias'));
    }

    // Muestra una sola categoría y sus libros
    public function showCategoria($id)
{
    $usuario = Auth::user();

    // Busca la categoría por su ID en MySQL
    $categoria = Categoria::findOrFail($id);

    // Obtiene los libros asociados a esta categoría
    $libros = $categoria->libros; 

    // Retorna la vista en la raíz de views: views/categoria.blade.php
    return view('categoria', compact('usuario', 'categoria', 'libros'));
}
}
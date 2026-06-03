<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Libro;

class DashboardController extends Controller
{
    public function index()
    {
        // Volvemos a traer al usuario real logueado de la sesión
        $usuario = Auth::user();

        // Categorías predefinidas que siempre deben existir
        $categoriasDefault = [
            ['nombre' => 'Matemáticas', 'imagen' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=500'],
            ['nombre' => 'Física', 'imagen' => 'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=500'],
            ['nombre' => 'Química', 'imagen' => 'https://images.unsplash.com/photo-1532187863486-abf9d39d6618?w=500'],
            ['nombre' => 'TICs', 'imagen' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500'],
            ['nombre' => 'Electrónica', 'imagen' => 'https://images.unsplash.com/photo-1517055729445-fa7d27394b48?w=500'],
            ['nombre' => 'Eléctrica', 'imagen' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500'],
        ];

        // Verificar y crear categorías predefinidas si no existen
        foreach ($categoriasDefault as $catDefault) {
            Categoria::firstOrCreate(
                ['nombre' => $catDefault['nombre']],
                ['imagen' => $catDefault['imagen']]
            );
        }

        // Obtener categorías de la base de datos
        $categorias = Categoria::all();

        return view('dashboard', compact('usuario', 'categorias'));
    }

    public function showCategoria($id)
    {
        // Obtener usuario autenticado
        $usuario = Auth::user();

        // Obtener categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Obtener libros de esa categoría
        $libros = Libro::where('Categorias_id_categorias', $id)->get();

        return view('categoria', compact('usuario', 'categoria', 'libros'));
    }

    public function search(Request $request)
    {
        $usuario = Auth::user();

        $q = $request->get('q');

        $libros = collect();
        if ($q) {
            $libros = Libro::where('titulo', 'like', "%{$q}%")
                ->orWhere('autor', 'like', "%{$q}%")
                ->orWhere('editorial', 'like', "%{$q}%")
                ->get();
        }

        return view('search', compact('usuario', 'libros', 'q'));
    }

    public function toggleFavorito($id)
    {
        $usuario = auth()->user();
        $libro = Libro::findOrFail($id);

        // Adjunta o remueve automáticamente el libro de los favoritos del usuario
        $usuario->favoritos()->toggle($libro->id_libros);

        return back()->with('success', 'Lista de favoritos actualizada correctamente.');
    }
}
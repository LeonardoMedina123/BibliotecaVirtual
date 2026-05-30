<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLibrosController extends Controller
{
    /**
     * Mostrar lista de libros (solo para admin)
     */
    public function index()
    {
        $usuario = Auth::user();
        $libros = Libro::with('categoria')->paginate(10);

        return view('admin.libros.index', compact('usuario', 'libros'));
    }

    /**
     * Mostrar formulario para crear nuevo libro
     */
    public function create()
    {
        $usuario = Auth::user();
        $categorias = Categoria::all();

        return view('admin.libros.create', compact('usuario', 'categorias'));
    }

    /**
     * Guardar nuevo libro en la BD
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:100',
            'editorial' => 'required|string|max:100',
            'portada_url' => 'nullable|url',
            'Categorias_id_categorias' => 'required|exists:categorias,id_categorias',
        ]);

        Libro::create($validated);

        // Si vino desde una categoría específica, regresar allí
        if ($request->has('categoria_id')) {
            return redirect()->route('categoria.show', $request->categoria_id)->with('success', 'Libro creado exitosamente.');
        }

        return redirect()->route('admin.libros.index')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Mostrar formulario para editar libro
     */
    public function edit(Libro $libro)
    {
        $usuario = Auth::user();
        $categorias = Categoria::all();

        return view('admin.libros.edit', compact('usuario', 'libro', 'categorias'));
    }

    /**
     * Actualizar libro en la BD
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:100',
            'editorial' => 'required|string|max:100',
            'portada_url' => 'nullable|url',
            'Categorias_id_categorias' => 'required|exists:categorias,id_categorias',
        ]);

        $libro->update($validated);

        return redirect()->route('admin.libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    /**
     * Eliminar libro
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        // Regresar a donde vino (categoría o lista de admin)
        return back()->with('success', 'Libro eliminado exitosamente.');
    }
}

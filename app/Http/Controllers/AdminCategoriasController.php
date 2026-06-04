<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoriasController extends Controller
{
    /**
     * Mostrar lista de categorías (solo para admin)
     */
    public function index()
    {
        $usuario = Auth::user();
        $categorias = Categoria::withCount('libros')->paginate(10);

        return view('admin.categorias.index', compact('usuario', 'categorias'));
    }

    /**
     * Mostrar formulario para crear nueva categoría
     */
    public function create()
    {
        $usuario = Auth::user();

        return view('admin.categorias.create', compact('usuario'));
    }

    /**
     * Guardar nueva categoría en la BD
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:categorias,nombre',
            'imagen' => 'nullable|url',
        ]);

        Categoria::create($validated);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Mostrar formulario para editar categoría
     */
    public function edit(Categoria $categoria)
    {
        $usuario = Auth::user();

        return view('admin.categorias.edit', compact('usuario', 'categoria'));
    }

    /**
     * Actualizar categoría en la BD
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:categorias,nombre,' . $categoria->id_categorias . ',id_categorias',
            'imagen' => 'nullable|url',
        ]);

        $categoria->update($validated);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Eliminar categoría
     */
    public function destroy(Categoria $categoria)
    {
        // Verificar si tiene libros
        if ($categoria->libros()->count() > 0) {
            return back()->with('error', 'No puedes eliminar una categoría que tiene libros. Elimina los libros primero.');
        }

        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}

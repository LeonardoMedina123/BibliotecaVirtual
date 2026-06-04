<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Libro;
use App\Models\Adeudo;
use Carbon\Carbon;

class FavoritoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        
        // Obtener los libros favoritos del usuario
        $favoritos = $usuario->favoritos()->get();

        return view('favoritos', compact('usuario', 'favoritos'));
    }

    public function rentar($id)
    {
        $usuario = Auth::user();
        $libro = Libro::findOrFail($id);

        // Crear el registro en la tabla adeudos con plazo de 14 días
        $fechaLimite = Carbon::now()->addDays(14);

        Adeudo::create([
            'Libros_id_libros' => $libro->id_libros,
            'Usuarios_id_usuario' => $usuario->id_usuario,
            'fecha_limite' => $fechaLimite
        ]);

        return back()->with('success', 'Libro rentado exitosamente. Tienes 14 días para devolverlo.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Volvemos a traer al usuario real logueado de la sesión
        $usuario = Auth::user();

        $categorias = [
            ['id' => 1, 'nombre' => 'Matemáticas', 'slug' => 'matematicas', 'imagen' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=500'],
            ['id' => 2, 'nombre' => 'Física', 'slug' => 'fisica', 'imagen' => 'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=500'],
            ['id' => 3, 'nombre' => 'Química', 'slug' => 'quimica', 'imagen' => 'https://images.unsplash.com/photo-1532187863486-abf9d39d6618?w=500'],
            ['id' => 4, 'nombre' => 'TICs', 'slug' => 'tics', 'imagen' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500'],
            ['id' => 5, 'nombre' => 'Electrónica', 'slug' => 'electronica', 'imagen' => 'https://images.unsplash.com/photo-1517055729445-fa7d27394b48?w=500'],
            ['id' => 6, 'nombre' => 'Eléctrica', 'slug' => 'electrica', 'imagen' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500'],
        ];

        return view('dashboard', compact('usuario', 'categorias'));
    }
}
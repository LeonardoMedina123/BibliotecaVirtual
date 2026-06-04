<?php

namespace App\Http\Controllers;

use App\Models\Adeudo;
use Illuminate\Support\Facades\Auth;

class AdeudoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        $adeudos = Adeudo::with(['libro'])
            ->where('Usuarios_id_usuario', $usuario->id_usuario)
            ->get();

        return view('Adeudos', compact('adeudos', 'usuario'));
    }
}
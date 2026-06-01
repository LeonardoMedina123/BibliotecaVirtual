<?php

namespace App\Http\Controllers;

use App\Models\Adeudo;
use Illuminate\Support\Facades\Auth;

class AdeudoController extends Controller
{
    public function index()
    {
        $adeudos = Adeudo::with(['libro', 'usuario'])
            ->where('fecha_limite', '<', now())
            ->get();

        $usuario = Auth::user();

        return view('Adeudos', compact('adeudos', 'usuario'));
    }
}
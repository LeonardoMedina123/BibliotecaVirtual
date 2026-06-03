<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminLibrosController;
use App\Http\Controllers\AdminCategoriasController;

// 1. Ruta Raíz
Route::get('/', [AuthController::class, 'showLogin']);

// 2. Rutas de Invitados (Login y Registro)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registro
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. Rutas Protegidas (Dashboard, Categorías y Logout)
Route::middleware('auth')->group(function () {
    // Vista principal que muestra todas las categorías
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // NUEVA RUTA: Vista dinámica para una categoría específica por su ID
    Route::get('/categoria/{id}', [DashboardController::class, 'showCategoria'])->name('categoria.show');
    
    // Cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Libros favoritos
    Route::post('/libro/{id}/favorito', [DashboardController::class, 'toggleFavorito'])->name('libro.favorito');
});

// 4. Rutas Solo Para ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Gestión de categorías (CRUD)
    Route::get('categorias', [AdminCategoriasController::class, 'index'])->name('categorias.index');
    Route::get('categorias/create', [AdminCategoriasController::class, 'create'])->name('categorias.create');
    Route::post('categorias', [AdminCategoriasController::class, 'store'])->name('categorias.store');
    Route::get('categorias/{categoria}/edit', [AdminCategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('categorias/{categoria}', [AdminCategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('categorias/{categoria}', [AdminCategoriasController::class, 'destroy'])->name('categorias.destroy');

    // Gestión de libros (CRUD)
    Route::get('libros/create', [AdminLibrosController::class, 'create'])->name('libros.create');
    Route::post('libros', [AdminLibrosController::class, 'store'])->name('libros.store');
    Route::get('libros', [AdminLibrosController::class, 'index'])->name('libros.index');
    Route::get('libros/{libro}/edit', [AdminLibrosController::class, 'edit'])->name('libros.edit');
    Route::put('libros/{libro}', [AdminLibrosController::class, 'update'])->name('libros.update');
    Route::delete('libros/{libro}', [AdminLibrosController::class, 'destroy'])->name('libros.destroy');
});

use App\Http\Controllers\AdeudoController;

Route::get('/adeudos', [AdeudoController::class, 'index'])
    ->name('adeudos.index');
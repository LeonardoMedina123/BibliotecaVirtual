<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Crear Categoría</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <header class="bg-[#1e293b] text-white shadow-md">
        <div class="h-12 bg-gradient-to-r from-slate-900 via-red-900 to-slate-950 flex items-center justify-between px-6 border-b border-slate-700">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-red-400 flex items-center justify-center text-white font-bold uppercase text-sm">
                    A
                </div>
                <div class="text-xs">
                    <p class="font-semibold leading-tight">{{ $usuario->nombre }}</p>
                    <p class="text-gray-400 text-[10px]">Admin Panel</p>
                </div>
            </div>
            <div class="text-sm font-bold tracking-wider text-gray-300">
                ADMINISTRADOR - TECNOLÓGICO NACIONAL DE MÉXICO
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('admin.categorias.index') }}" class="text-gray-300 hover:text-white font-medium text-sm">
                ← Volver a Categorías
            </a>
        </div>
    </header>

    <main class="max-w-2xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-6">Crear Nueva Categoría</h1>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <p class="font-bold mb-2">Por favor corrige los siguientes errores:</p>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categorias.store') }}" method="POST" class="bg-white rounded-lg shadow p-8">
            @csrf

            <div class="mb-6">
                <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Nombre de la Categoría</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Ej: Programación, Literatura, etc." required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="imagen" class="block text-sm font-semibold text-gray-700 mb-2">URL de la Imagen (Portada)</label>
                <input type="url" name="imagen" id="imagen" value="{{ old('imagen') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="https://ejemplo.com/imagen.jpg">
                @error('imagen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs mt-1">Ingresa una URL válida de una imagen</p>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    Crear Categoría
                </button>
                <a href="{{ route('admin.categorias.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Crear Libro</title>
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
            @if(request('categoria_id'))
                <a href="{{ route('categoria.show', request('categoria_id')) }}" class="text-gray-300 hover:text-white font-medium text-sm">
                    ← Volver a Categoría
                </a>
            @else
                <a href="{{ route('admin.libros.index') }}" class="text-gray-300 hover:text-white font-medium text-sm">
                    ← Volver a Libros
                </a>
            @endif
        </div>
    </header>

    <main class="max-w-2xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-6">Crear Nuevo Libro</h1>

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

        <form action="{{ route('admin.libros.store') }}" method="POST" class="bg-white rounded-lg shadow p-8">
            @csrf

            @if(request('categoria_id'))
                <input type="hidden" name="categoria_id" value="{{ request('categoria_id') }}">
            @endif

            <div class="mb-6">
                <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-2">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Ingresa el título del libro" required>
            </div>

            <div class="mb-6">
                <label for="autor" class="block text-sm font-semibold text-gray-700 mb-2">Autor</label>
                <input type="text" name="autor" id="autor" value="{{ old('autor') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Ingresa el nombre del autor" required>
            </div>

            <div class="mb-6">
                <label for="editorial" class="block text-sm font-semibold text-gray-700 mb-2">Editorial</label>
                <input type="text" name="editorial" id="editorial" value="{{ old('editorial') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Ingresa el nombre de la editorial" required>
            </div>

            <div class="mb-6">
                <label for="portada_url" class="block text-sm font-semibold text-gray-700 mb-2">URL de la Portada</label>
                <input type="url" name="portada_url" id="portada_url" value="{{ old('portada_url') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="https://ejemplo.com/portada.jpg">
            </div>

            <div class="mb-6">
                <label for="Categorias_id_categorias" class="block text-sm font-semibold text-gray-700 mb-2">Categoría</label>
                <select name="Categorias_id_categorias" id="Categorias_id_categorias" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categorias }}" 
                                {{ (request('categoria_id') && request('categoria_id') == $categoria->id_categorias) || old('Categorias_id_categorias') == $categoria->id_categorias ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    Crear Libro
                </button>
                <a href="{{ route('admin.libros.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </main>

</body>
</html>

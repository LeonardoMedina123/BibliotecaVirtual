<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Gestionar Categorías</title>
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
            <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white font-medium text-sm">
                ← Volver al Dashboard
            </a>

            <div class="flex items-center space-x-3">
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit" class="flex items-center space-x-1 text-gray-300 hover:text-red-400 font-medium text-sm transition bg-slate-800 px-3 py-1.5 rounded-md border border-slate-700">
                        <span>Salir</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Gestionar Categorías</h1>
                <p class="text-gray-600">Crea, edita y elimina categorías de la biblioteca</p>
            </div>
            <a href="{{ route('admin.categorias.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                + Nueva Categoría
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Libros</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Imagen</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $categoria)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $categoria->nombre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $categoria->libros_count }} {{ $categoria->libros_count == 1 ? 'libro' : 'libros' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                @if($categoria->imagen)
                                    <img src="{{ $categoria->imagen }}" alt="{{ $categoria->nombre }}" class="w-12 h-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('admin.categorias.edit', $categoria->id_categorias) }}" class="text-blue-600 hover:text-blue-900 font-medium">Editar</a>
                                <form action="{{ route('admin.categorias.destroy', $categoria->id_categorias) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro? {{ $categoria->libros_count > 0 ? 'Esta categoría tiene libros!' : '' }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium" {{ $categoria->libros_count > 0 ? 'disabled' : '' }} style="{{ $categoria->libros_count > 0 ? 'opacity: 0.5; cursor: not-allowed;' : '' }}">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                No hay categorías. <a href="{{ route('admin.categorias.create') }}" class="text-blue-600 hover:underline">Crear la primera</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $categorias->links() }}
        </div>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - {{ $categoria->nombre }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <header class="bg-[#1e293b] text-white shadow-md">
        <div class="h-12 bg-gradient-to-r from-slate-900 via-blue-900 to-slate-950 flex items-center justify-between px-6 border-b border-slate-700">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-slate-400 flex items-center justify-center text-slate-900 font-bold uppercase">
                    {{ Str::substr($usuario->nombre, 0, 1) }}
                </div>
                <div class="text-xs">
                    <p class="font-semibold leading-tight">{{ $usuario->nombre }}</p>
                    <p class="text-gray-400 text-[10px]">{{ $usuario->correo }}</p>
                </div>
            </div>
            <div class="text-sm font-bold tracking-wider text-gray-300">
                TECNOLÓGICO NACIONAL DE MÉXICO
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-4">
            <div class="relative inline-block text-left">
                <button id="menu-button" class="text-gray-300 hover:text-white focus:outline-none p-2 rounded-lg hover:bg-slate-800 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div id="dropdown-menu" class="hidden absolute left-0 mt-2 w-52 rounded-xl shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50 overflow-hidden">
                    <div class="py-1">
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-900 hover:text-white transition-colors">
                            Volver al Inicio
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex-1 max-w-2xl">
                <form action="#" method="GET" class="relative">
                    <input type="text" placeholder="Busca los libros de tu preferencia (Editorial, título o autor)..." class="w-full bg-gray-200 text-gray-800 placeholder-gray-500 pl-4 pr-10 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm shadow-inner">
                    <button type="submit" class="absolute right-3 top-2.5 text-gray-500 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

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
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="mb-8 flex items-center justify-between">
            <div>
                <span class="text-blue-900 font-bold text-lg block leading-none">Categorías</span>
                <div class="flex items-center mt-1">
                    <h1 class="text-xl font-bold text-slate-800 bg-white pr-4 z-10 whitespace-nowrap">
                        {{ $categoria->nombre }}
                    </h1>
                </div>
            </div>
            
            @if($usuario->rol === 'admin')
                <a href="{{ route('admin.libros.create', ['categoria_id' => $categoria->id_categorias]) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                    + Agregar Libro
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($libros as $libro)
                <div class="bg-gray-300 text-gray-800 rounded-[2.5rem] p-5 flex gap-4 shadow-sm relative items-center h-48 border border-gray-400">
                    
                    <div class="w-24 h-36 bg-white shadow-md flex-shrink-0 rounded-md overflow-hidden">
                        <img src="{{ $libro->portada_url }}" alt="{{ $libro->titulo }}" class="w-full h-full object-cover">
                    </div>

                    <div class="flex flex-col justify-between h-36 text-xs flex-1 min-w-0">
                        <div>
                            <p class="font-bold text-gray-500 uppercase tracking-wide text-[10px]">Título:</p>
                            <h3 class="font-semibold text-slate-900 truncate mb-1 text-sm">{{ $libro->titulo }}</h3>

                            <p class="font-bold text-gray-500 uppercase tracking-wide text-[10px]">Editorial:</p>
                            <p class="text-slate-800 truncate mb-1">{{ $libro->editorial }}</p>

                            <p class="font-bold text-gray-500 uppercase tracking-wide text-[10px]">Autor:</p>
                            <p class="text-slate-800 truncate">{{ $libro->autor }}</p>
                        </div>

                        <div class="flex items-center gap-1 mt-2">
                            <button class="flex items-center space-x-1 text-blue-700 font-bold hover:text-blue-900 transition">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                </svg>
                                <span class="text-sm">Favoritos</span>
                            </button>

                            @if($usuario->rol === 'admin')
                                <div class="ml-auto flex gap-2">
                                    <a href="{{ route('admin.libros.edit', $libro->id_libros) }}" class="text-yellow-600 hover:text-yellow-800 font-bold text-sm transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.libros.destroy', $libro->id_libros) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 text-gray-500">
                    <p class="text-lg font-medium">No hay libros disponibles en esta categoría actualmente.</p>
                    <a href="{{ route('dashboard') }}" class="text-blue-900 underline mt-2 inline-block">Volver al Dashboard</a>
                </div>
            @endforelse
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            menuButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                if (!dropdownMenu.classList.contains('hidden') && !dropdownMenu.contains(event.target) && event.target !== menuButton) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
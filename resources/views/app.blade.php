<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Dashboard</title>
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
                        <a href="#" class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-900 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-4 w-4 text-gray-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Configuración
                        </a>
                        <a href="{{ route('adeudos.index') }}" class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-900 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-4 w-4 text-gray-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                         </svg>
                        Adeudos Pendientes
                        </a>

                        <a href="#" class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-900 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-4 w-4 text-gray-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L22 8m-2 5v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m16-5V6a2 2 0 00-2-2H6a2 2 0 00-2 2v4" />
                            </svg>
                            Contacto
                        </a>

                        @if($usuario->rol === 'admin')
                            <div class="border-t border-gray-200"></div>
                            <a href="{{ route('admin.libros.index') }}" class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-red-100 hover:text-red-900 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-4 w-4 text-red-400 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                                Panel de Admin
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex-1 max-w-2xl">
                <form action="#" method="GET" class="relative">
                    <input type="text" 
                           placeholder="Busca los libros de tu preferencia (Editorial, título o autor)..." 
                           class="w-full bg-gray-200 text-gray-800 placeholder-gray-500 pl-4 pr-10 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm shadow-inner">
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
    @yield('content')
</main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            // 1. Mostrar/Ocultar el menú al dar clic en las 3 líneas
            menuButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            // 2. Cerrar el menú automáticamente si se hace clic en cualquier otro lado de la pantalla
            document.addEventListener('click', function (event) {
                if (!dropdownMenu.classList.contains('hidden') && !dropdownMenu.contains(event.target) && event.target !== menuButton) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | Biblioteca Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen bg-cover bg-center bg-no-repeat overflow-hidden relative" style="background-image: url('fondo.jpg');">
    @include('Header')

    <main class="flex flex-col lg:flex-row items-center justify-between h-full w-full px-8 md:px-24 gap-10">
        <div class="w-full lg:max-w-xl text-white">
            <h1 class="text-7xl md:text-9xl font-semibold leading-[0.85] tracking-tight">Biblioteca <br> Virtual</h1>
            <p class="mt-6 text-lg md:text-xl text-white/90">Crea tu cuenta y únete a la experiencia digital de la biblioteca. Gestiona tus préstamos, favoritos y lecturas con estilo.</p>
        </div>

        <div class="w-full lg:flex-1 lg:max-w-[44rem]">
            @include('partials.auth.register-form')
        </div>
    </main>
</body>
</html>

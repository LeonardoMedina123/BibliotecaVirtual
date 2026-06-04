
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Biblioteca Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen bg-cover bg-center bg-no-repeat overflow-hidden relative" style="background-image: url('fondo.jpg');">
    @include('Header')

    <main class="flex flex-col lg:flex-row items-center justify-between h-full w-full px-8 md:px-24 gap-10">
        <div class="w-full lg:max-w-xl text-white">
            <h1 class="text-7xl md:text-9xl font-semibold leading-[0.85] tracking-tight">Biblioteca <br> Virtual</h1>
            <p class="mt-6 text-lg md:text-xl text-white/90">Accede a tu cuenta para explorar libros disponibles, administrar tus préstamos y guardar favoritos desde una experiencia moderna.</p>
        </div>

        <div class="w-full lg:flex-1 lg:max-w-[44rem]">
            @include('partials.auth.login-form')
        </div>
    </main>
</body>
</html>


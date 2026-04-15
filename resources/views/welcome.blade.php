<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen bg-cover bg-center bg-no-repeat overflow-hidden relative" style="background-image: url('fondo.jpg');">
    
    @include('Header')

    <main class="flex items-center justify-between h-full w-full px-12 md:px-24">
        
        <div class="max-w-xl">
            <h1 class="text-white text-7xl md:text-9xl font-semibold leading-[0.85] tracking-tight">
                Biblioteca <br> Virtual
            </h1>
        </div>

        <div class="flex-shrink-0">
            @include('login')
        </div>

    </main>

</body>
</html>
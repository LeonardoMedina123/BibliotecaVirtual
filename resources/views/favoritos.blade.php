@extends('app')

@section('content')

<div class="bg-white rounded-xl shadow-lg p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        Favoritos y Rentas
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($favoritos->isEmpty())
        <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-16 h-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.25S6.5 28.25 12 28.25s10-4.75 10-10.75S17.5 6.253 12 6.253z" />
            </svg>
            <p class="text-gray-500 text-lg">No tienes libros favoritos aún</p>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">
                Volver al dashboard para agregar favoritos
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th class="p-4 text-left">Portada</th>
                        <th class="p-4 text-left">Título</th>
                        <th class="p-4 text-left">Autor</th>
                        <th class="p-4 text-left">Editorial</th>
                        <th class="p-4 text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favoritos as $libro)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">
                                <img src="{{ $libro->portada_url }}" alt="{{ $libro->titulo }}" class="w-16 h-24 object-cover rounded-lg shadow">
                            </td>
                            <td class="p-4 font-medium text-gray-800">{{ $libro->titulo }}</td>
                            <td class="p-4 text-gray-700">{{ $libro->autor }}</td>
                            <td class="p-4 text-gray-700">{{ $libro->editorial }}</td>
                            <td class="p-4 text-center">
                                <form action="{{ route('favorito.rentar', $libro->id_libros) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition inline-flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Rentar</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-sm text-gray-600">
            <p class
="font-semibold mb-2">📋 Información de rentas:</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Cada renta tiene un plazo de <strong>14 días</strong></li>
                <li>Después del plazo, aparecerá como adeudo en tu sección de "Adeudos Pendientes"</li>
                <li>Verifica los adeudos pendientes regularmente</li>
            </ul>
        </div>
    @endif
</div>

@endsection

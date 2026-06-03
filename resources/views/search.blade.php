@extends('app')

@section('content')

<div class="bg-white rounded-xl shadow-lg p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-6">Resultados de búsqueda</h1>

    @if(isset($q) && $q)
        <p class="text-sm text-gray-600 mb-4">Resultados para: <strong>{{ $q }}</strong></p>
    @endif

    @if($libros->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No se encontraron libros.</p>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">Volver al dashboard</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($libros as $libro)
                <div class="border rounded-lg p-4 bg-white shadow-sm">
                    <img src="{{ $libro->portada_url }}" alt="{{ $libro->titulo }}" class="w-full h-40 object-cover rounded mb-3">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $libro->titulo }}</h3>
                    <p class="text-gray-600 text-sm">{{ $libro->autor }}</p>
                    <p class="text-gray-500 text-xs mt-2">{{ $libro->editorial }}</p>

                    <div class="mt-4 flex items-center justify-between">
                        <form action="{{ route('libro.favorito', $libro->id_libros) }}" method="POST">
                            @csrf
                            <button class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Agregar a favoritos</button>
                        </form>
                        <form action="{{ route('favorito.rentar', $libro->id_libros) }}" method="POST">
                            @csrf
                            <button class="text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Rentar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection

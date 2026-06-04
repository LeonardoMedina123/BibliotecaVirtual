@extends('app')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-xl font-bold text-blue-900">Categorías</h1>
        <p class="text-sm text-gray-600">
            Selecciona la categoría de tu preferencia
        </p>
    </div>

    @if($usuario->rol === 'admin')
        <a href="{{ route('admin.categorias.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
            + Nueva Categoría
        </a>
    @endif
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($categorias as $categoria)
        <a href="{{ route('categoria.show', $categoria->id_categorias) }}"
           class="group relative block h-48 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

            <img src="{{ $categoria->imagen ?? 'https://via.placeholder.com/500x400?text=' . $categoria->nombre }}"
                 alt="{{ $categoria->nombre }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end p-4">
                <h2 class="text-white font-bold text-lg tracking-wide">
                    {{ $categoria->nombre }}
                </h2>
            </div>
        </a>
    @endforeach
</div>

@endsection
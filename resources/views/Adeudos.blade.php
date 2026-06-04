@extends('app')

@section('content')

<div class="bg-white rounded-xl shadow-lg p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-6">
        Adeudos Pendientes
    </h1>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-blue-900 text-white">
                <th class="p-3 text-left">Libro</th>
                <th class="p-3 text-left">Autor</th>
                <th class="p-3 text-left">Fecha límite</th>
            </tr>
        </thead>

        <tbody>
            @forelse($adeudos as $adeudo)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-3">{{ $adeudo->libro->titulo }}</td>
                    <td class="p-3">{{ $adeudo->libro->autor }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($adeudo->fecha_limite)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">
                        No hay adeudos pendientes.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
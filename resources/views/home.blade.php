@extends('layouts.app')

@section('title', 'Inicio - Mi Booking')

@section('content')
    {{-- Hero azul estilo Booking --}}
    <div class="bg-[#003580] text-white p-10 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-4">Encuentra tu próxima estadía</h2>
        <p class="text-lg">Busca hoteles, departamentos y mucho más...</p>
    </div>

    {{-- Caja de búsqueda en blanco --}}
    <div class="bg-white p-6 mt-6 rounded-lg shadow-lg">
        <form class="flex flex-col md:flex-row gap-4">
            <input type="text" placeholder="Destino" class="flex-1 border p-2 rounded-md">
            <input type="date" class="border p-2 rounded-md">
            <input type="date" class="border p-2 rounded-md">
            <button class="bg-[#003580] text-white px-4 py-2 rounded-md hover:bg-blue-900">
                Buscar
            </button>
        </form>
    </div>
@endsection

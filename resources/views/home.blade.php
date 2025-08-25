@extends('layouts.app')

@section('title', 'Inicio - Mi Booking')

@section('content')
    @auth
        <div class="bg-[#003580] text-white w-full ">
            <div class="container max-w-6xl py-8 mx-auto">
                <h2 class="text-5xl font-bold mb-4 -mt-4">¿A dónde irás, {{ Auth::user()->name }}?</h2>
                <p class="text-2xl mb-9">¡Encuentra el lugar de tus próximas vacaciones!</p>
            </div>
        </div>
    @endauth
    @guest
        <div class="bg-[#003580] text-white w-full ">
            <div class="container max-w-6xl py-8 mx-auto">
                <h2 class="text-5xl font-bold mb-4 -mt-4">Encuentra tu próxima estancia</h2>
                <p class="text-2xl mb-9">Busca hoteles, departamentos y mucho más...</p>
            </div>
        </div>
    @endguest
    <div class="bg-[#003580] text-white w-full pt-4 shadow-md relative">
        <div class="bg-white p-2 rounded-lg shadow-lg absolute left-1/2 transform -translate-x-1/2 bottom-0 translate-y-1/2 w-full max-w-6xl border-4 border-[#ffb700]">
            <form class="flex flex-col md:flex-row gap-2 text-sm">

                @livewire('destino-search')

                <!-- Fecha inicio -->
                <div class="flex items-center border rounded-md px-2 w-80">
                    <iconify-icon icon="mdi:calendar-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                    <input type="text" placeholder="Fecha de entrada - Fecha de salida" class="p-2 outline-none w-80 border-0 text-sm">
                </div>

                <!-- Adultos -->
                <div class="flex items-center border rounded-md px-2 w-80">
                    <iconify-icon icon="mdi:account-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                    <input type="number" min="1" value="1" class="p-2 outline-none w-80 border-0">
                </div>

                <!-- Botón -->
                <button class="bg-[#003580] text-white px-4 py-2 rounded-md hover:bg-blue-900 max-w-xs">
                    Buscar
                </button>
            </form>
        </div>
    </div>
@endsection

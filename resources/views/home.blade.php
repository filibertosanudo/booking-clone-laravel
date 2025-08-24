@extends('layouts.app')

@section('title', 'Inicio - Mi Booking')

@section('content')
    @guest
        <div class="bg-[#003580] text-white w-full ">
            <div class="container max-w-6xl py-8 mx-auto pl-4">
                <h2 class="text-5xl font-bold mb-4 -mt-4">Encuentra tu próxima estadía</h2>
                <p class="text-2xl mb-9">Busca hoteles, departamentos y mucho más...</p>
            </div>
        </div>
    @endguest
    <div class="bg-[#003580] text-white w-full pt-4 shadow-md relative">
        <div class="bg-white p-2 rounded-lg shadow-lg absolute left-1/2 transform -translate-x-1/2 bottom-0 translate-y-1/2 w-full max-w-5xl border-4 border-[#ffb700]">
            <form class="flex flex-col md:flex-row gap-2">

                <!-- Destino -->
                <div class="flex items-center border rounded-md px-2 flex-1 max-w-sm">
                    <iconify-icon icon="mdi:bed-king-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                    <input type="text" placeholder="Destino" class="flex-1 p-2 outline-none border-0">
                </div>

                <!-- Fecha inicio -->
                <div class="flex items-center border rounded-md px-2 w-72">
                    <iconify-icon icon="mdi:calendar-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                    <input type="date" class="p-2 outline-none border-0">
                </div>

                <!-- Adultos -->
                <div class="flex items-center border rounded-md px-2 w-72">
                    <iconify-icon icon="mdi:account-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                    <input type="number" min="1" value="1" class="p-2 outline-none w-16 border-0">
                </div>

                <!-- Botón -->
                <button class="bg-[#003580] text-white px-4 py-2 rounded-md hover:bg-blue-900 max-w-xs">
                    Buscar
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection

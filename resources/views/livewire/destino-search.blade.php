<div class="relative flex-1 max-w-sm">
    <div class="flex items-center border rounded-md px-2">
        <iconify-icon icon="mdi:bed-king-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
        <input type="text"
               wire:model.live.debounce.300ms="query"
               placeholder="¿A dónde vas?"
               class="flex-1 p-2 outline-none border-0 text-sm text-black"
               autocomplete="off">
    </div>

    @if($mostrarSugerencias && !empty($destinos) && count($destinos) > 0)
        <div class="absolute top-full mt-1 bg-white border rounded-md shadow-lg z-50 w-full max-h-60 overflow-y-auto">
            @foreach($destinos as $destino)
                <button type="button"
                        wire:click="seleccionarDestino('{{ $destino->location }}')"
                        class="block px-4 py-2 text-left w-full hover:bg-gray-100 text-gray-900 border-b border-gray-100 last:border-b-0">
                    <iconify-icon icon="mdi:map-marker" width="16" height="16" class="text-gray-500 mr-2 inline"></iconify-icon>
                    {{ $destino->location }}
                </button>
            @endforeach
        </div>
    @endif

    @if($mostrarSugerencias && strlen($query) >= 2 && count($destinos) === 0)
        <div class="absolute top-full mt-1 bg-white border rounded-md shadow-lg z-50 w-full">
            <div class="px-4 py-3 text-gray-500 text-sm">
                No se encontraron destinos
            </div>
        </div>
    @endif
</div>

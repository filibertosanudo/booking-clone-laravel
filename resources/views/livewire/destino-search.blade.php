<div x-data="autocomplete()" class="relative w-full">
    <input
        type="text"
        placeholder="Buscar destino..."
        x-model="query"
        @input="fetchSuggestions"
        class="w-full bg-transparent outline-none text-sm border rounded px-2 py-1 border-white"
        @focus="open = true"
        @click.away="open = false"
    >

    {{-- Opciones --}}
    <div
        class="absolute left-0 right-0 mt-1 bg-white border border-[#ffb700] rounded-md shadow-lg z-50"
        x-show="open && filtered.length > 0"
    >
        <template x-for="(item, index) in filtered" :key="index">
            <div
                class="flex items-center px-3 py-2 text-sm text-gray-700 cursor-pointer hover:bg-[#ffb700] hover:text-black"
                @click="selectSuggestion(item)"
            >
                <iconify-icon icon="mdi:location-on-outline" width="20" height="20" class="text-gray-500 mr-2"></iconify-icon>
                <span x-text="item"></span>
            </div>
        </template>
    </div>
</div>

<script>
function autocomplete() {
    return {
        query: '',
        filtered: [],
        open: false,

        async fetchSuggestions() {
            if (this.query.length < 2) {
                this.filtered = [];
                return;
            }

            let response = await fetch(`/api/destinos?q=${this.query}`);
            this.filtered = await response.json();
        },

        selectSuggestion(suggestion) {
            this.query = suggestion;
            this.filtered = [];
            this.open = false;

            const nextInput = document.querySelector('input[name="fecha"]');
            if (nextInput) nextInput.focus();
        }
    }
}
</script>

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;

class DestinoSearch extends Component
{
    public $query = '';
    public $destinos = [];
    public $mostrarSugerencias = false;

    public function updatedQuery()
    {
        if (strlen($this->query) >= 2) {
            $this->destinos = Listing::where('location', 'like', '%' . $this->query . '%')
                ->select('location')
                ->distinct()
                ->limit(5)
                ->get();
            $this->mostrarSugerencias = true;
        } else {
            $this->destinos = [];
            $this->mostrarSugerencias = false;
        }
    }

    public function seleccionarDestino($location)
    {
        $this->query = $location;
        $this->destinos = [];
        $this->mostrarSugerencias = false;

        $this->dispatch('destinoSeleccionado', $location);
    }

    public function ocultarSugerencias()
    {
        $this->mostrarSugerencias = false;
        $this->destinos = [];
    }

    public function render()
    {
        return view('livewire.destino-search');
    }
}

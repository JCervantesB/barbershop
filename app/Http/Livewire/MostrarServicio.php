<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarServicio extends Component
{
    //propiedad para que espere el servicio
    public $servicio;
    public function render()
    {
        return view('livewire.mostrar-servicio');
    }
}

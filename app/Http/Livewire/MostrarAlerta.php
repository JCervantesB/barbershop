<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    //definiendo message como propiedad para que espere ese valor y se lo pase al livewire
    public $message;
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}

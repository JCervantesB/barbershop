<?php

namespace App\Http\Livewire;

use App\Models\servicios;
use Livewire\Component;

class MostrarServicios extends Component
{
    protected $listeners = ['eliminar_servicio'];
   public function eliminar_servicio(servicios $servicios)
    {
       //eliminando el servicio
        $servicios->delete();
        
    }
    
    public function render()
    {
        $servicios = servicios::where('user_id',auth()->user()->id)->paginate('5');

        //pasandole el modelo de servicios a la vista
        return view('livewire.mostrar-servicios',[
                                                    'servicios' => $servicios
                                                 ]);
    }
}

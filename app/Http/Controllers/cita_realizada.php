<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;

class cita_realizada extends Controller
{ 
  public function index()
  {
    $citas = citas::where('user_id',auth()->user()->id)->get();
    
    return view('cita_reservada', [
                                     'citas' => $citas
                                  ]);
  }

  public function destroy(citas $citas)
  {
       $citas->delete();
       //crear el mensaje de publicacion
       session()->flash('eliminar_cita','El servicio agendado fue eliminado');
       return redirect()->route('cita_realizadas');
  }
}

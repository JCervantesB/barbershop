<?php

namespace App\Http\Controllers;

use App\Mail\cita_mail;
use App\Models\citas;
use App\Models\carritos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class cita_controller extends Controller
{ 
    public function index()
    {
      $servicios = carritos::all()->count();
      
        return view('servicios.cita',[
                                       'servicios_en_carrito' => $servicios

                                     ]);
    }
    //
    public function store(Request $request)
    {
      //guardando todos los servicios en carrito
      $servicios = carritos::all();
      
        //validaciones
       $this->validate($request,[
            'fecha_cita' => 'required',
            'hora_cita' => 'required',
             
          ]);
       //extrayendo la hora y los minutos seleccionado por el usuario 
        $hora = explode(':',$request['hora_cita'])[0];
        $minutos= explode(':',$request['hora_cita'])[1];
        $dia_cita = date('l', strtotime($request['fecha_cita']));
      
       //evaluando si el usuario eligio lunes para mandarle un mensaje de error de dia no laborable
       if($dia_cita == 'Monday')
       {
          //imprimir un mensaje con la variable $session
          return back()->with('fecha_cita','los lunes son dia no laborables'); 
        
       }
        
        //mensaje de error cuando se selecciona una hora que sea fuera de entre las 8 y las 5
         if($hora < 8|| $hora > 17)
         {
            
            //imprimir un mensaje con la variable $session
             return back()->with('hora_cita','Horario no laborable');
             
         }  
         //mensaje de error cuando se selecciona los minutos que no sean 30 o 00
         if($minutos == 00)
         {
            //cuando pase todas las validaciones se agregara todos los servicios
            foreach($servicios as $servicio)
           {
              citas::create([
                            'servicios_id' => $servicio->servicios_id, 
                            'user_id' => auth()->user()->id,
                            'fecha_cita' => $request['fecha_cita'],
                            'hora_cita' =>  $hora
                            
                         ]);
            }

            //eliminando los registros del carrito cuando ya se guarde en la tabla cita
            foreach($servicios as $servicio)
            {
              carritos::where('user_id',auth()->user()->id)->delete();
            }

            $fecha_cita = $request['fecha_cita'];
             //Enviando un email al usuario autenticado enviando la clase que tiene el contenido del email
            Mail::to(auth()->user()->email)->send(new cita_mail($fecha_cita));

            //imprimir un mensaje con la variable $session 
            return redirect()->route('servicios.cliente')->with('mensaje','Se ha agregado la cita satisfactoriamente');
             
         }

         else
         {
            //imprimir un mensaje con la variable $session
            return back()->with('hora_cita','seleccione una cita solo a las 00 o en punto');
         }

        

         //redireccionando al usuario
       //return redirect()->route('servicios.carrito');
    
    }

    
}

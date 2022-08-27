<?php

namespace App\Http\Controllers;


use App\Models\carritos;
use App\Models\servicios;
use App\Models\User;
use Illuminate\Http\Request;

class carrito_controller extends Controller
{
    //
    public function index(carritos $carrito)
    { //con el get al final es que se muestran los datos cuando se coloca un where   
      $carrito_t = carritos::where('user_id',auth()->user()->id)->get();
      
        return view('servicios.carrito',[
                                          'carrito' => $carrito_t 
                                        ]);
    }

    public function create(Request $request,carritos $carrito)
    {  
      $carrito_t = carritos::where('servicios_id',$request->servicios_id)->where('user_id',auth()->user()->id)->count();
      //evaluando de lo que se envio como request para agregar servicio exista como servicio
      $servicios = servicios::where('id',$request->servicios_id)->count();
      

     if($servicios == 1)
      
     {

      //cuando no existe el registro en carrito
      if($carrito_t === 0)
      {

        //evaluando de que si el id del servicio enviado a carrito si fue alterado exista en carrito
        //tambien si lo cambia como quiera no puede repetir el mismo servicio
        
       carritos::create([
                          
                        'servicios_id' => $request->servicios_id,
                        'user_id' => auth()->user()->id,
                    
                        ]);

         //crear el mensaje de publicacion
       session()->flash('mensaje','El servicio se a agregado al carrito');

       //redireccionando al usuario
       return redirect()->route('servicios.cliente');
      }

      //cuando existe 
      else if($carrito_t === 1)
      {
       //crear el mensaje de publicacion
       session()->flash('error_carrito','El servicio no se agregado porque este ya esta en el carrito');

       //redireccionando al usuario
       return redirect()->route('servicios.cliente');
      }

     } //fin del if que evalua si el registro se encuentra en la base de datos

     else
     {
       //crear el mensaje de publicacion
       session()->flash('error_carrito','El servicio no se agrego porque el id fue alterado');
       
       //redireccionando al usuario
       return redirect()->route('servicios.cliente');
     }

    }
   
    //se debe pedir como parametro el modelo para poder usar el route model vounding
    public function destroy(carritos $carrito)
    {
      if($carrito->user_id === auth()->user()->id)
      {
       $carrito->delete();
       return redirect()->route('servicios.carrito');
      }
     
     
    }

    //funcion que evalua si el carrito esta vacio para si lo esta manda mensaje de error y si no lo redirecciona a seleccionar la cita
    public function check()
    {
      //guardando todos los servicios en carrito
      $servicios = carritos::all();
      if($servicios->count() == 0)
      {
        //imprimir un mensaje con la variable $session 
        return back()->with('error','No se puede seleccionar el dia de la cita si el carrito esta vacio');
      }

      else
      {
         return redirect()->route('cita.index');
      }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class crear_administrador extends Controller
{
    public function index()
    {
        return view('administrador.create');
    }

    public function store(Request $request)
    {
        //validaciones
        $this->validate($request,[
                                   'name' => 'required',
                                   'email' => 'required|email',
                                   'password' => 'required',
                                   'password_confirmation' => 'required'  
                                 ]);
        
        User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'rol' =>  1
                     ]);
                                
       //crear el mensaje de publicacion
       session()->flash('mensaje','El administrador se a registrado correctamente');

       //redireccionando al usuario
       return redirect()->route('servicios.index');
    }
}

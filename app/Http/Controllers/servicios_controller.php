<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\servicios;
use Illuminate\Http\Request;

class servicios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //aplicando una politica de que solo el duenio puede ver los servicios en el panel de administracion
        $this->authorize('viewAny',servicios::class);

        //retornando la vista de los servicios
        return view ('servicios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //aplicando una politica de que solo el duenio puede crear servicios
        $this->authorize('create',servicios::class);
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //funcion para mostrar la informacion de los servicios
    public function show(servicios $servicios)
    {
        //retornando la vista
        return view('servicios.show',[
                                        'servicio' => $servicios
                                     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(servicios $servicios)
    {
        $categorias = categoria::all();
        
        //aplicando una politica para que solo el administrador pueda editar
        $this->authorize('update',$servicios);

        return view('servicios.edit',[
            'servicios' => $servicios,
            'categorias' =>$categorias
        ]);
    }

   
}

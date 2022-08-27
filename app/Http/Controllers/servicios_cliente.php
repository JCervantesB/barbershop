<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\servicios;
use Illuminate\Http\Request;

class servicios_cliente extends Controller
{
    //
    public function index(servicios $servicios)
    {
        $servicios_t = $servicios::all();

        return view('servicios.servicios_cliente',[
                                                   'servicios' => $servicios_t  
                                                   ]);
    }
}

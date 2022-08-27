<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CrearAdministrador extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $rules=[
                     'name' => 'required',
                     'email' => 'required',
                     'password' => 'required',
                     'password_confirmation' => 'required'
                  ];
    public function render()
    {
        return view('livewire.crear-administrador');
    }

    public function registrar()
    {

    }
}

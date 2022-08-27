<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use App\Models\servicios;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearServicios extends Component
{
    public $nombre;
    public $precio;
    public $categoria;
    public $descripcion;
    public $imagen;

     //habilitando subida de archivos
      use WithFileUploads; 

     //las reglas de validacion
    protected $rules = [
                          'nombre' => 'required|string',
                          'precio' => 'required',
                          'categoria' => 'required',
                          'descripcion' => 'required',
                          'imagen' => 'image|max:5048'
                       ];

    //esta es la funcion que manda a llamar el formulario de crear servicios para las validaciones
    public function crear_servicios()
    {
       $datos = $this->validate();

       //almacenando la imagen
       $imagen = $this->imagen->store('public/servicios');
       

       //almacenando en la variable solo el nombre de la imagen
       $imagen_nombre = str_replace('public/servicios/','', $imagen);

       //creando el servicio
       servicios::create([
                            'nombre'=>$datos['nombre'],
                            'precio' =>$datos['precio'],
                            'categoria_id' =>$datos['categoria'],
                            'descripcion' =>$datos['descripcion'],
                            'imagen' =>$imagen_nombre,
                            'publicado'=>1,
                            'user_id' => auth()->user()->id
                         ]);

       //crear el mensaje de publicacion
       session()->flash('mensaje','El servicio se a publicado correctamente');
      
       //redireccionando al usuario
      return redirect()->route('servicios.index');
       
    }

    public function render()
    {  $categoria = categoria::all();
        return view('livewire.crear-servicios',[
            'categorias' => $categoria
        ]);
    }
}

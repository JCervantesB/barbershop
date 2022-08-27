<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use App\Models\servicios;
use Livewire\WithFileUploads;

class EditarServicio extends Component
{   public $id_servicio;
    public $nombre;
    public $precio;
    public $categoria;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;
    
    //habilitando subida de archivo
    use WithFileUploads;
     //las reglas de validacion
     protected $rules = [
        'nombre' => 'required|string',
        'precio' => 'required',
        'categoria' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:5048'
       
     ];

    //funcion para poder asignarle los valores a las propiedades de la clase y conectarlo con el wiremodel
    public function mount(servicios $servicios)
    { $this->id_servicio = $servicios->id;
      $this->nombre = $servicios->nombre;
      $this->precio = $servicios->precio;
      $this->categoria = $servicios->categoria_id;
      $this->descripcion = $servicios->descripcion;
      $this->imagen = $servicios->imagen;
    
    }

    //funcion para editar el servicio
    public function editar_servicio()
    {
      $datos = $this->validate();

      //revisar si hay una imagen nueva para guardarla en el servidor o pc
      if($this->imagen_nueva)
      {
        $imagen = $this->imagen_nueva->store('public/servicios');

        //sacando solo el nombre de la imagen de la ruta completa de la imagen
        $datos['imagen'] = str_replace('public/servicios/','',$imagen);
      }

      //encontrar el servicio
      $servicio = servicios::find($this->id_servicio);
      
      //editando los campos
      $servicio->nombre = $datos['nombre'];
      $servicio->precio = $datos['precio'];
      $servicio->categoria_id = $datos['categoria'];
      $servicio->descripcion = $datos['descripcion'];
      //editando la imagen y si no hay nada en imagen se queda con la imagen guardada
      $servicio->imagen = $datos['imagen'] ?? $servicio->imagen;

      //guardando los cambios
      $servicio->save();

      //mostrando mensaje
      session()->flash('mensaje','Se ha actualizado el registro correctamente');

      //retornando al usuario
      return redirect()->route('servicios.index');
    }

    public function render()
    {
        $categorias = categoria::all();
        return view('livewire.editar-servicio',[
                                                 'categorias' =>$categorias
                                               ]);
    }
}

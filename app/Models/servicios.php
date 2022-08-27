<?php

namespace App\Models;

use App\Models\User;
use App\Models\citas;
use App\Models\carrito;
use App\Models\categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class servicios extends Model
{
    use HasFactory;

    protected $fillable = [
                            'nombre',
                            'precio',
                            'categoria_id',
                            'descripcion',
                            'imagen',
                            'publicado',
                            'user_id'
                          ];

     //creando la relacion entre servicios y categoria                     
    public function categoria()
    {
      return $this->belongsTo(categoria::class);
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }

    public function carrito()
    {
      return $this->belongsTo(carrito::class);
    }

   
}

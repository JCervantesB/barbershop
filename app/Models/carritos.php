<?php

namespace App\Models;

use App\Models\User;
use App\Models\servicios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class carritos extends Model
{
    protected $fillable = [
        'servicios_id',
        'user_id'
        
      ];

      public function User()
    {
      return $this->belongsTo(User::class);
    }

     //creando la relacion entre carrito y servicios                     
     public function servicios()
     {
       return $this->belongsTo(servicios::class);
     }
}

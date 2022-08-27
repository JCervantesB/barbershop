<?php

namespace App\Models;

use App\Models\User;
use App\Models\servicios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicios_id',
        'user_id',
        'fecha_cita',
        'hora_cita',
        'minuto_cita'
        
      ];

     public function user()
     {
        return $this->belongsTo(User::class);
     }

     public function servicios()
     {
       return $this->belongsTo(servicios::class);
     }
}

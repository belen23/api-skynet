<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
     // Asignamos la tabla del modelo
     protected $table = 'direccion';

     public function direccion()
     {
         return $this->hasMany('App\User', 'user_id');
         return $this->hasMany('App\Municipio', 'municipio_id');
     }
}

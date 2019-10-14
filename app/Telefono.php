<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    // Asignamos la tabla del modelo
    protected $table = 'telefono';

    public function telefono()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}

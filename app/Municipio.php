<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    // Asignamos la tabla del modelo
    protected $table = 'municipio';

    public function municipio()
    {
        return $this->hasMany('App\Departamento', 'departamento_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionCaso extends Model
{
    
    // Asignamos la tabla del modelo
    protected $table = 'Asignacion_caso';

    public function Asignacioncaso()
    {
        return $this->hasMany('App\User', 'user_id');
        return $this->hasMany('App\caso', 'caso_id');
    }
}

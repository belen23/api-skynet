<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use DB;

class Documento extends Model
{
    // Asignamos la tabla del modelo
    protected $table = 'documento';

    //asignación de relación llave foranea
    public function documento()
    {
        return $this->hasMany('App\Tipodocumento', 'tipodocumento_id');
    }

     //llama el procedimiento almacenado
     public static function documento_procedimiento() {
        $usuario= Auth::user()->id;
        $datos=DB::select("call docusuarios ('$usuario')");
        return $datos;
    }
}

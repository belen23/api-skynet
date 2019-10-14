<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use DB;

class DocumentoCaso extends Model
{
     // Asignamos la tabla del modelo
     protected $table = 'documentoCaso';

    //asignación de relación llave foranea
     public function documento()
     {
         return $this->hasMany('App\caso', 'caso_id');
     }

      //llama el procedimiento almacenado
      public static function dcaso_procedimiento() {
        $usuario= Auth::user()->id;
        $datos=DB::select("call dcasousuarios ('$usuario')");
        return $datos;
    }
}

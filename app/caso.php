<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;


class Caso extends Authenticatable
{
    // Asignamos la tabla del modelo

    protected $table = 'caso';
    
    
    

    // asignación de relación
    public function caso() {
        return $this->belongsTo('App\tipoCaso', 'tipocaso_id');
    }

    //llama el procedimiento almacenado
    public static function caso_procedimiento(Request $request) {
        $usuario= Auth::user()->id;
        $datos=DB::select("call casousuarios('$usuario')");
        return $datos;
    }
    
}

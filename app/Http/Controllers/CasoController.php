<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use App\Caso;



class CasoController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index( Request $request )
    {

            
        // Metodo get para casos
        $caso = Caso::caso_procedimiento($request);
        return response()->json(array(
            'caso' => $caso,
            'status' => 'success'
        ), 200);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Metodo Post

        // Validaciones
        $validacion = \Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'tipocaso_id' => 'required'
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

    
        $caso = new caso();
        $caso->nombre = $request->nombre;
        $caso->tipocaso_id = $request->tipocaso_id;
        

        // fecha y hora actual de la creación
        $caso->estado_inicial = date("Y-m-d H:i:s");
        $caso->save();


        return response()->json([
            'caso' => $caso,
            'status' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get by ide
        $caso = Caso::find($id);
        if(is_object($caso)){
            return response()->json([
                'caso' => $caso,
                'status' => 'succes'
            ], 200);
        } else {
            return response()->json([
                'message' => 'El Tipo de caso no Existe',
                'status' => 'error'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // metodo put
         $caso = Caso::find($id);
         if(is_object($caso)){
 
         $validacion = \Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'tipocaso_id' => 'required'
         ]);
      
 
         // Actualizar registro
         $caso= Caso::where('id', $id)->update($request->all());
 
         return response()->json([
             'message' => 'Actualizado Correctamente',
             'status' => 'succes'
         ], 200);
 
         } else {
             return response()->json([
                 'message' => 'El Tipo de caso no Existe',
                 'status' => 'error'
             ], 404);
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // metodo delete
    $caso = Caso::find($id);

    $caso->delete();
    

    return response()->json([
        'caso' => $caso,
        'status' => 'success'
    ], 200);
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\Request;
use App\DocumentoCaso;

class DocumentoCasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Metodo get para documentocaso
        $doc = DocumentoCaso::dcaso_procedimiento();
        return response()->json(array(
            'dcaso' => $doc,
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
            'ubicacion_doc' => 'required|max:100',
            'caso_id' => 'required'
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $dcaso = new DocumentoCaso();
        $dcaso->nombre = $request->nombre;
        $dcaso->ubicacion_doc = $request->ubicacion_doc;
        $dcaso->caso_id = $request->caso_id;
        

        // fecha y hora actual de la creación
        $dcaso->creacion = date("Y-m-d H:i:s");;
        $dcaso->save();

        return response()->json([
            'documentocaso' => $dcaso,
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
        $dcaso = DocumentoCaso::find($id);
        if(is_object($dcaso)){
            return response()->json([
                'documentocaso' => $dcaso,
                'status' => 'succes'
            ], 200);
        } else {
            return response()->json([
                'message' => 'El Tipo de documento no Existe',
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
        $dcaso = DocumentoCaso::find($id);
        if(is_object($dcaso)){

        $validacion = \Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'ubicacion_doc' => 'required|max:100',
            'caso_id' => 'required'
        ]);
     

        // Actualizar registro
        $dcaso= DocumentoCaso::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Actualizado Correctamente',
            'status' => 'succes'
        ], 200);

        } else {
            return response()->json([
                'message' => 'El Tipo de documento no Existe',
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
    $dcaso = DocumentoCaso::find($id);

    $dcaso->delete();

    return response()->json([
        'documentocaso' => $dcaso,
        'status' => 'success'
    ], 200);
    }
}

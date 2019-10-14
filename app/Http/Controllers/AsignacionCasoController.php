<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignacionCaso;

class AsignacionCasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaso = AsignacionCaso::all();
        // Metodo get
        return response()->json([
            'acaso' => $acaso,
            'status' => 'success'
        ], 200);
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
            'user_id' => 'required',
            'caso_id' => 'required',
            'acciones_realizadas' => 'required|min:20|max:200'
         

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $acaso = new AsignacionCaso();
        $acaso->user_id = $request->user_id;
        $acaso->caso_id = $request->caso_id;
        $acaso->acciones_realizadas = $request->acciones_realizadas;

        
        // aprobacion
        $acaso->aprobado=false;

        // fecha y hora actual de la creación
        $acaso->asignacion = date("Y-m-d H:i:s");;
        $acaso->save();

        return response()->json([
            'asigancioncaso' => $acaso,
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
         $acaso = AsignacionCaso::find($id);
         if(is_object($acaso)){
             return response()->json([
                 'asignacioncaso' => $acaso,
                 'status' => 'succes'
             ], 200);
         } else {
             return response()->json([
                 'message' => 'El Tipo de asignacion no Existe',
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
        $acaso = AsignacionCaso::find($id);
        if(is_object($acaso)){

        $validacion = \Validator::make($request->all(), [
            'user_id' => 'required',
            'caso_id' => 'required',
            'acciones_realizadas' => 'required|min:20|max:200',
            'aprobado' => 'required'
        ]);
     

        // Actualizar registro
        $acaso = AsignacionCaso::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Actualizado Correctamente',
            'status' => 'succes'
        ], 200);

        } else {
            return response()->json([
                'message' => 'El Tipo de asignacion no Existe',
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
    $acaso = AsignacionCaso::find($id);

    $acaso->delete();

    return response()->json([
        'asignacioncaso' => $acaso,
        'status' => 'success'
    ], 200);
    }
}

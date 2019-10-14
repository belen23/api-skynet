<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoCaso;

class TipoCasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tcaso = tipoCaso::all();
        // Metodo get
        return response()->json([
            'tipocaso' => $tcaso,
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
            'tipo' => 'required|min:5',
            'descripcion' => 'required|min:15'
        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $tcaso = new tipoCaso();
        $tcaso->tipo = $request->tipo;
        $tcaso->descripcion = $request->descripcion;
        // fecha y hora actual del estado
        $tcaso->estado = date("Y-m-d H:i:s");;
        $tcaso->save();

        return response()->json([
            'tipocaso' => $tcaso,
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
        $tcaso = tipoCaso::find($id);
        if(is_object($tcaso)){
            return response()->json([
                'tipocaso' => $tcaso,
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
        $tcaso = tipoCaso::find($id);
        if(is_object($tcaso)){

        $validacion = \Validator::make($request->all(), [
            'tipo' => 'required|min:5',
            'descripcion' => 'required|min:15'
        ]);

        // Actualizar registro
        $tcaso = tipoCaso::where('id', $id)->update($request->all());

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
        $tcaso = tipoCaso::find($id);

        $tcaso->delete();

        return response()->json([
            'tipocaso' => $tcaso,
            'status' => 'success'
        ], 200);
    }
}

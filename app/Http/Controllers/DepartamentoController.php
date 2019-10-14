<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep = Departamento::all();
        // Metodo get
        return response()->json([
            'departamento' => $dep,
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
            'departamento' => 'required|max:45'
            
        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $dep = new Departamento();
        
        $dep->departamento = $request->departamento;
        
        // fecha y hora actual del estado
        $dep->estado = date("Y-m-d H:i:s");;
        $dep->save();

        return response()->json([
            'departamento' => $dep,
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
        // get by id
        $dep = Departamento::find($id);
        if(is_object($dep)){
            return response()->json([
                'departamento' => $dep,
                'status' => 'succes'
            ], 200);
        } else {
            return response()->json([
                'message' => 'El departamento no Existe',
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
        $dep = Departamento::find($id);
        if(is_object($dep)){

        $validacion = \Validator::make($request->all(), [
            'departamento' => 'required|max:45',
            
        ]);

        // Actualizar registro
        $dep = Departamento::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Actualizado Correctamente',
            'status' => 'succes'
        ], 200);

        } else {
            return response()->json([
                'message' => 'El departamento no Existe',
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
        $dep = Departamento::find($id);

        $dep->delete();

        return response()->json([
            'tipocaso' => $dep,
            'status' => 'success'
        ], 200);
    }
}

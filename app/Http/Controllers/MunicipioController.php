<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muni = Municipio::all();
        // Metodo get
        return response()->json([
            'municipio' => $muni,
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
            'municipio' => 'required|max:75',
            'departamento_id' => 'required'
            
            
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $muni = new Municipio();
        $muni->municipio = $request->municipio;
        $muni->departamento_id = $request->departamento_id;
        
        

        // fecha y hora actual de la creación
        $muni->estado = date("Y-m-d H:i:s");;
        $muni->save();

        return response()->json([
            'municipio' => $muni,
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
         $muni = Municipio::find($id);
         if(is_object($muni)){
             return response()->json([
                 'municipio' => $muni,
                 'status' => 'succes'
             ], 200);
         } else {
             return response()->json([
                 'message' => 'El municipio no Existe',
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
        $muni = Municipio::find($id);
        if(is_object($muni)){

        $validacion = \Validator::make($request->all(), [
            'municipio' => 'required|max:75',
            'departamento_id' => 'required'
            
        ]);
     

        // Actualizar registro
        $muni = Municipio::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Actualizado Correctamente',
            'status' => 'succes'
        ], 200);

        } else {
            return response()->json([
                'message' => 'El municipio no Existe',
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
    $muni = Municipio::find($id);

    $muni->delete();

    return response()->json([
        'municipio' => $muni,
        'status' => 'success'
    ], 200);
    }
}

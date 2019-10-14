<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telefono;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tel = Telefono::all();
        // Metodo get
        return response()->json([
            'telefono' => $tel,
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
            'numero' => 'required|max:15',
            'tipo' => 'required|max:45',
            'user_id' => 'required'
            
            
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $tel = new Telefono();
        $tel->numero = $request->numero;
        $tel->tipo = $request->tipo;
        $tel->user_id = $request->user_id;
        
        

        // fecha y hora actual de la creación
        $tel->estado = date("Y-m-d H:i:s");;
        $tel->save();

        return response()->json([
            'telefono' => $tel,
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
        $tel = Telefono::find($id);
        if(is_object($tel)){
            return response()->json([
                'telefono' => $tel,
                'status' => 'succes'
            ], 200);
        } else {
            return response()->json([
                'message' => 'El telefono no Existe',
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
        $tel = Telefono::find($id);
        if(is_object($tel)){

        $validacion = \Validator::make($request->all(), [
            'numero' => 'required|max:15',
            'tipo' => 'required|max:45',
            'user_id' => 'required'
            
        ]);
     

        // Actualizar registro
        $tel = Telefono::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'Actualizado Correctamente',
            'status' => 'succes'
        ], 200);

        } else {
            return response()->json([
                'message' => 'El telefono no Existe',
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
    $tel = Telefono::find($id);

    $tel->delete();

    return response()->json([
        'telefono' => $tel,
        'status' => 'success'
    ], 200);
    }
    
}

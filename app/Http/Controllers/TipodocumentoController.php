<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipodocumento;

class TipodocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdocumento = Tipodocumento::all();
        //Metodo get
        return response()->json([
            'tipodocumento' => $tdocumento,
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

        $tdocumento = new tipodocumento();
        $tdocumento->tipo = $request->tipo;
        $tdocumento->descripcion = $request->descripcion;
        // fecha y hora actual del estado
        $tdocumento->estado = date("Y-m-d H:i:s");;
        $tdocumento->save();

        return response()->json([
            'tipodocumento' => $tdocumento,
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
        //get by ide
        $tdocumento = Tipodocumento::find($id);
        if(is_object($tdocumento)){
            return response()->json([
                'tipodocumento' => $tdocumento,
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
        $tdocumento = Tipodocumento::find($id);
        if(is_object($tdocumento)){

        $validacion = \Validator::make($request->all(), [
            'tipo' => 'required|min:5',
            'descripcion' => 'required|min:15'
        ]);

        // Actualizar registro
        $tdocumento = Tipodocumento::where('id', $id)->update($request->all());

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
        $tdocumento = Tipodocumento::find($id);

        $tdocumento->delete();

        return response()->json([
            'tipodocumento' => $tdocumento,
            'status' => 'success'
        ], 200);
    }
}

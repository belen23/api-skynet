<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direc = Direccion::all();
        // Metodo get
        return response()->json([
            'direccion' => $direc,
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
            'direccion' => 'required|max:100',
            'descripcion' => 'required|min:15',
            'user_id' => 'required',
            'municipio_id' => 'required',
            
            
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $direc = new Direccion();
        $direc->direccion = $request->direccion;
        $direc->descripcion = $request->descripcion;
        $direc->user_id = $request->user_id;
        $direc->municipio_id = $request->municipio_id;
        
        

        // fecha y hora actual de la creación
        $direc->estado = date("Y-m-d H:i:s");;
        $direc->save();

        return response()->json([
            'direccion' => $direc,
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
        $direc = Direccion::find($id);
        if(is_object($direc)){
            return response()->json([
                'direccion' => $direc,
                'status' => 'succes'
            ], 200);
        } else {
            return response()->json([
                'message' => 'La direccion no Existe',
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
         $direc = Direccion::find($id);
         if(is_object($direc)){
 
         $validacion = \Validator::make($request->all(), [
            'direccion' => 'required|max:100',
            'descripcion' => 'required|min:15',
            'user_id' => 'required',
            'municipio_id' => 'required',
         ]);
      
 
         // Actualizar registro
         $direc = Direccion::where('id', $id)->update($request->all());
 
         return response()->json([
             'message' => 'Actualizado Correctamente',
             'status' => 'succes'
         ], 200);
 
         } else {
             return response()->json([
                 'message' => 'La direccion no Existe',
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
    $direc = Direccion::find($id);

    $direc->delete();

    return response()->json([
        'direccion' => $direc,
        'status' => 'success'
    ], 200);
    }
}

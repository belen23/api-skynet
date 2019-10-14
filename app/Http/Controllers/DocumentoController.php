<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\Request;
use App\Documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // Metodo get para documento
        $doc = Documento::documento_procedimiento();
        return response()->json(array(
            'documento' => $doc,
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
            'descripcion' => 'required|min:20|max:200',
            'resolucion' => 'required|min:20|max:200',
            'tipodocumento' => 'required'
            

        ]);
        
        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        }

        $doc = new Documento();
        $doc->nombre = $request->nombre;
        $doc->ubicacion_doc = $request->ubicacion_doc;
        $doc->descripcion = $request->descripcion;
        $doc->resolucion = $request->resolucion;
        $doc->tipodocumento_id = $request->tipodocumento;
        
        // aprobacion
        $doc->aprobacion=false;

        // fecha y hora actual de la creación
        $doc->creacion = date("Y-m-d H:i:s");;
        $doc->save();

        return response()->json([
            'documento' => $doc,
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
        $doc = Documento::find($id);
        if(is_object($doc)){
            return response()->json([
                'documento' => $doc,
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
        $doc = Documento::find($id);
        if(is_object($doc)){

        $validacion = \Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'ubicacion_doc' => 'required|max:100',
            'descripcion' => 'required|min:20|max:200',
            'resolucion' => 'required|min:20|max:200',
            'aprobacion' => 'required',
            'tipodocumento' => 'required'
        ]);
     

        // Actualizar registro
        $doc = Documento::where('id', $id)->update($request->all());

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
    $doc = Documento::find($id);

    $doc->delete();

    return response()->json([
        'documento' => $doc,
        'status' => 'success'
    ], 200);
    }
}

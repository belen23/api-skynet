<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'UserController@register')->name('registrausuario');

Route::post('/auth', function(Request $request) {
    $valid = Auth::attempt($request->all());

    if ( $valid) {
        $user = Auth::user();
        $user->api_token =  Str::random(100);;
        $user->save();

        $user->makeVisible('api_token');

        return $user;
    }

    return response()->json([
        'message' => 'Error en usuario y contraseña'
    ], 404);


    
});

Route::middleware('auth:api')->resource('/caso', 'CasoController');
Route::middleware('auth:api')->resource('/tipo-caso', 'TipoCasoController');
Route::middleware('auth:api')->resource('/tipo-documento', 'TipodocumentoController');
Route::middleware('auth:api')->resource('/documento', 'DocumentoController');
Route::middleware('auth:api')->resource('/telefono', 'TelefonoController');
Route::middleware('auth:api')->resource('/departamento', 'DepartamentoController');
Route::middleware('auth:api')->resource('/municipio', 'MunicipioController');
Route::middleware('auth:api')->resource('/direccion', 'DireccionController');
Route::middleware('auth:api')->resource('/documentocaso', 'DocumentoCasoController');
Route::middleware('auth:api')->resource('/asignacioncaso', 'AsignacionCasoController');
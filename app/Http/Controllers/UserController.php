<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // Register
    public function register(Request $request) {

        $validacion = \Validator::make($request->all(), [
            'dpi' => ['required', 'string', 'max:15'],
            'nombre' => ['required', 'string', 'max:45'],
            'apellido' => ['required', 'string', 'max:45'],
            'fecha_nacimiento' => ['required', 'date', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // si no se cumple regresa una respuesta
        if($validacion->fails()){
            return response()->json($validacion->errors(), 400);
        };

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->dpi = $request->dpi;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user ->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->api_token =  Str::random(100);
        $user->user_role = 'REG_USER';
        $user->estado = date("Y-m-d H:i:s");
        
        $user->save();
        
        return response()->json([
            'usuario' => 'Ingreso',
            'status' => 'Exitoso'
        ], 200);
        
    }
}

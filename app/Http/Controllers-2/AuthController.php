<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;  // Cambiado a Actor
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'correoactor' => 'required|email',  // Cambiado a 'correoactor'
            'claveactor' => 'required'         // Cambiado a 'claveactor'
        ]);

        // Intentar encontrar el usuario por su email en la tabla 'actor'
        $actor = Actor::where('correoactor', $request->correoactor)->first();

        // Verificar si el actor existe y si la contraseña es correcta
        if ($actor && Hash::check($request->claveactor, $actor->claveactor)) {
            //    if ($actor && $request->claveactor === $actor->claveactor) {
            // Generar una respuesta exitosa
            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'actor' => $actor,
            ], 200);
        }

        // Responder con un mensaje de error si las credenciales no son correctas
        return response()->json([
            'message' => 'Credenciales incorrectas',
        ], 401);
    }

    
}
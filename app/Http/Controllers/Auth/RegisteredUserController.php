<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\RoleUser;
use App\Models\User;

class RegisteredUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisteredUserRequest $request)
    {
        // Registrar un nuevo usuario
        $userData = $request->all();
        $userData['passworduser'] = bcrypt($request->passworduser);
        $user = User::create($userData);

        // Genera el token con SANCTUM
        $token = $user->createToken($user->emailuser)->plainTextToken;

        // Guardar al usuario y su rol
        $role_user = RoleUser::create([
            "iduser" => $user->iduser,
            "idrol" => $request->idrol
        ]);

        return response()->json([
            "msg" => "Registro de usuario exitoso",
            "roleUser" => $role_user,
            "token" => $token
        ]);
    }
}

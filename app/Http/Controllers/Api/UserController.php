<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        Log::info('Inicio del método update', ['user_id' => $user->iduser]);

        // Actualizar la contraseña si está presente
        if ($request->filled('passworduser')) {
            Log::info('La solicitud contiene passworduser', ['passworduser' => $request->passworduser]);
            $user->passworduser = bcrypt($request->passworduser);
        }

        // Actualizar la imagen de perfil si está presente
        if ($request->hasFile('profileuser')) {
            $timestamp = now()->format('YmdHis');
            $originalName = $request->file('profileuser')->getClientOriginalName();
            Log::info('Archivo de perfil encontrado', ['originalName' => $originalName, 'timestamp' => $timestamp]);

            $profilePath = $request->file('profileuser')->storeAs('profiles', $timestamp . '_' . $originalName, 'public');
            $user->profileuser = $profilePath;
            Log::info('Ruta del perfil guardada', ['profilePath' => $profilePath]);
        }

        // Actualizar otros datos del usuario
        $user->nameuser = $request->input('nameuser', $user->nameuser);
        $user->lastnameuser = $request->input('lastnameuser', $user->lastnameuser);
        $user->use_iduser = $request->input('use_iduser', $user->use_iduser);

        Log::info('Datos a actualizar', [
            'nameuser' => $user->nameuser,
            'lastnameuser' => $user->lastnameuser,
            'use_iduser' => $user->use_iduser,
            'passworduser' => $user->passworduser,
            'profileuser' => $user->profileuser,
        ]);

        $user->save();

        Log::info('Usuario actualizado', ['user' => $user]);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}

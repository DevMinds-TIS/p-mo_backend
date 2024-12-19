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
        $user->load('user');
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        Log::info('Inicio del método update', ['user_id' => $user->iduser]);

        // Log adicional para verificar los datos recibidos
        Log::info('Datos recibidos para actualizar el usuario', $request->all());

        // Manejo de archivo del perfil del usuario
        if ($request->hasFile('profileuser')) {
            $file = $request->file('profileuser');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profiles', $filename, 'public');
            $user->profileuser = $path;
            Log::info('Archivo de perfil actualizado', ['profileuser' => $path]);
        }

        // Actualizar otros datos del usuario
        $user->nameuser = $request->input('nameuser', $user->nameuser);
        $user->lastnameuser = $request->input('lastnameuser', $user->lastnameuser);
        $user->use_iduser = $request->input('use_iduser', $user->use_iduser);

        // Actualizar la contraseña si está presente
        if ($request->filled('passworduser')) {
            $user->passworduser = bcrypt($request->input('passworduser'));
        }

        $user->save();

        Log::info('Datos actualizados del usuario', [
            'nameuser' => $user->nameuser,
            'lastnameuser' => $user->lastnameuser,
            'use_iduser' => $user->use_iduser,
            'passworduser' => $user->passworduser,
            'profileuser' => $user->profileuser,
        ]);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}

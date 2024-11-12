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

    // public function update(UserRequest $request, User $user)
    // {
    //     if ($request->filled('passworduser')) {
    //         $user->passworduser = bcrypt($request->passworduser);
    //     }

    //     if ($request->hasFile('profileuser')) {
    //         $timestamp = now()->format('YmdHis');
    //         $originalName = $request->file('profileuser')->getClientOriginalName();
    //         $profilePath = $request->file('profileuser')->storeAs('profiles', $timestamp . '_' . $originalName, 'public');
    //         $user->profileuser = $profilePath;
    //     }

    //     $user->update($request->except(['passworduser', 'profileuser']) + ['passworduser' => $user->passworduser]);

    //     return new UserResource($user);
    // }

    public function update(UserRequest $request, User $user)
    {
        Log::info('Inicio del método update', ['user_id' => $user->id]);

        if ($request->filled('passworduser')) {
            Log::info('La solicitud contiene passworduser', ['passworduser' => $request->passworduser]);
            $user->passworduser = bcrypt($request->passworduser);
        }

        if ($request->hasFile('profileuser')) {
            $timestamp = now()->format('YmdHis');
            $originalName = $request->file('profileuser')->getClientOriginalName();
            Log::info('Archivo de perfil encontrado', ['originalName' => $originalName, 'timestamp' => $timestamp]);

            $profilePath = $request->file('profileuser')->storeAs('profiles', $timestamp . '_' . $originalName, 'public');
            $user->profileuser = $profilePath;
            Log::info('Ruta del perfil guardada', ['profilePath' => $profilePath]);
        }

        $dataToUpdate = $request->except(['passworduser', 'profileuser']) + ['passworduser' => $user->passworduser];
        Log::info('Datos a actualizar', ['dataToUpdate' => $dataToUpdate]);

        $user->update($dataToUpdate);

        Log::info('Usuario actualizado', ['user' => $user]);

        return new UserResource($user);
    }



    // public function update(UserRequest $request, User $user)
    // {
    //     // Verificar si se ha cargado un archivo para el perfil de usuario
    //     // if ($request->hasFile('profileuser')) {
    //     //     // Obtener el archivo
    //     //     $file = $request->file('profileuser');
    //     //     // Generar un nombre único para el archivo
    //     //     $filename = time() . '_' . $file->getClientOriginalName();
    //     //     // Guardar el archivo en la ubicación deseada
    //     //     $path = $file->storeAs('profiles', $filename, 'public');
    //     //     // Actualizar el campo profileuser con la ruta del archivo
    //     //     $user->profileuser = $path;
    //     // }
    //     if ($request->filled('passworduser')) {
    //         $user->passworduser = bcrypt($request->passworduser);
    //     }
    //     $user->update($request->except(['passworduser']) + ['passworduser' => $user->passworduser]);
    //     // $data = $request->except(['passworduser', 'profileuser']);
    //     // $user->update($data + ['passworduser' => $user->passworduser]);
    //     return new UserResource($user);
    // }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}

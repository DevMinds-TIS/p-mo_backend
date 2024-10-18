<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UsersRequest;
use App\Http\Resources\Api\UsersResource;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return UsersResource::collection(User::all());
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UsersResource($user);
    }

    public function update(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        // Verificar si se ha cargado un archivo para el perfil de usuario
        if ($request->hasFile('profileuser')) {
            // Obtener el archivo
            $file = $request->file('profileuser');
            // Generar un nombre único para el archivo
            $filename = time() . '_' . $file->getClientOriginalName();
            // Guardar el archivo en la ubicación deseada
            $path = $file->storeAs('profiles', $filename, 'public');
            // Actualizar el campo profileuser con la ruta del archivo
            $user->profileuser = $path;
        }
        // $user->update($request->all());
        $user->update($request->except('profileuser'));
        return new UsersResource($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}

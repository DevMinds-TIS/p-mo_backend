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
        // $user->update($request->validated());
        $user->update($request);
        return new UsersResource($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}

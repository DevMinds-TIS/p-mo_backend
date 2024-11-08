<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RoleUserRequest;
use App\Http\Resources\Api\RoleUserResource;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    public function index()
    {
        return RoleUserResource::collection(RoleUser::all());
    }

    public function store(RoleUserRequest $request)
    {
        return new RoleUserResource(RoleUser::create($request->all()));
    }

    public function show(RoleUser $roleUser)
    {
        return new RoleUserResource($roleUser);
    }

    public function update(RoleUserRequest $request, RoleUser $roleUser)
    {
        $roleUser->update($request->all());
        return new RoleUserResource($roleUser);
    }

    public function destroy(RoleUser $roleUser)
    {
        $roleUser->delete();
        return response()->json(['message' => 'El rol del usuario ah eliminado exitosamente']);
    }
}

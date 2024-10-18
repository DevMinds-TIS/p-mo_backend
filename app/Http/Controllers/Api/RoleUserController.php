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

    public function show($id)
    {
        $rolUser = RoleUser::findOrFail($id);
        return new RoleUserResource($rolUser);
    }

    public function update(RoleUserRequest $request, $id)
    {
        $rolUser = RoleUser::findOrFail($id);
        $rolUser->update($request->all());
        return new RoleUserResource($rolUser);
    }

    public function destroy($id)
    {
        $rolUser = RoleUser::findOrFail($id);
        $rolUser->delete();
        return response()->json(['message' => 'El rol del usuario ah eliminado exitosamente']);
    }
}

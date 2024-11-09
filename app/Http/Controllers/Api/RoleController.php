<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RoleRequest;
use App\Http\Resources\Api\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function store(RoleRequest $request)
    {
        return new RoleResource(Role::create($request->all()));
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Rol eliminado exitosamente']);
    }
}

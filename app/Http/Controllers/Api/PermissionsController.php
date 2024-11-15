<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PermissionRequest;
use App\Http\Resources\Api\PermissionResource;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }

    public function store(PermissionRequest $request)
    {
        return new PermissionResource(Permission::create($request->all()));
    }

    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        return new PermissionResource($permission);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json(['message' => 'Permiso eliminado exitosamente']);
    }
}

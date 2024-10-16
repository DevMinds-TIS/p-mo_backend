<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PermissionsRequest;
use App\Http\Resources\Api\PermissionsResource;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return PermissionsResource::collection(Permission::all());
    }

    public function store(PermissionsRequest $request)
    {
        return new PermissionsResource(Permission::create($request->all()));
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return new PermissionsResource($permission);
    }

    public function update(PermissionsRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return new PermissionsResource($permission);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return response()->json(['message' => 'Rol eliminado exitosamente']);
    }
}

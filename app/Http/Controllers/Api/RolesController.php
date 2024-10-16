<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RolesRequest;
use App\Http\Requests\Api\UpdateRolesRequest;
use App\Http\Resources\Api\RolesResource;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return RolesResource::collection(Role::all());
    }

    public function store(RolesRequest $request)
    {
        return new RolesResource(Role::create($request->all()));
    }

    public function show($id)
    {
        $rol = Role::findOrFail($id);
        return new RolesResource($rol);
    }

    public function update(RolesRequest $request, $id)
    {
        $rol = Role::findOrFail($id);
        $rol->update($request->all());
        return new RolesResource($rol);
    }

    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();
        return response()->json(['message' => 'Rol eliminado exitosamente']);
    }
}

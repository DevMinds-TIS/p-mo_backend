<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SpaceRequest;
use App\Http\Resources\Api\SpaceResource;
use App\Models\Space;

class SpaceController extends Controller
{
    public function index()
    {
        return SpaceResource::collection(Space::all());
    }

    public function store(SpaceRequest $request)
    {
        return new SpaceResource(Space::create($request->all()));
    }

    public function show(Space $space)
    {
        $space = Space::findOrFail($space->idspace);
        return new SpaceResource($space);
    }

    public function update(SpaceRequest $request, Space $space)
    {
        $space->update($request->all());
        return new SpaceResource($space);
    }

    public function destroy(Space $space)
    {
        $space->delete();
        return response()->json(['message' => 'Espacio del docente eliminado exitosamente']);
    }
}

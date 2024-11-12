<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SprintRequest;
use App\Http\Resources\Api\SprintResource;
use App\Models\Sprint;

class SprintController extends Controller
{
    public function index()
    {
        return SprintResource::collection(Sprint::all());
    }

    public function store(SprintRequest $request)
    {
        return new SprintResource(Sprint::create($request->all()));
    }

    public function show(Sprint $sprint)
    {
        return new SprintResource($sprint);
    }

    public function update(SprintRequest $request, Sprint $sprint)
    {
        $sprint->update($request->all());
        return new SprintResource($sprint);
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();
        return response()->json(['message' => 'Sprint eliminado exitosamente']);
    }
}

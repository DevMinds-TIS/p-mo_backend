<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlanningRequest;
use App\Http\Resources\Api\PlanningResource;
use App\Models\Planning;

class PlanningsController extends Controller
{
    public function index()
    {
        return PlanningResource::collection(Planning::all());
    }

    public function store(PlanningRequest $request)
    {
        return new PlanningResource(Planning::create($request->all()));
    }

    public function show(Planning $planning)
    {
        return new PlanningResource($planning);
    }

    public function update(PlanningRequest $request, Planning $planning)
    {
        $planning->update($request->all());
        return new PlanningResource($planning);
    }

    public function destroy(Planning $planning)
    {
        $planning->delete();
        return response()->json(['message' => 'Planificación eliminada exitosamente']);
    }
}

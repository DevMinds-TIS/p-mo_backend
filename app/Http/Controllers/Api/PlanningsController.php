<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlanningsRequest;
use App\Http\Resources\Api\PlanningsResource;
use App\Models\Planning;

class PlanningsController extends Controller
{
    public function index()
    {
        return PlanningsResource::collection(Planning::all());
    }

    public function store(PlanningsRequest $request)
    {
        return new PlanningsResource(Planning::create($request->all()));
    }

    public function show($id)
    {
        $planning = Planning::findOrFail($id);
        return new PlanningsResource($planning);
    }

    public function update(PlanningsRequest $request, $id)
    {
        $planning = Planning::findOrFail($id);
        $planning->update($request->all());
        return new PlanningsResource($planning);
    }

    public function destroy($id)
    {
        $planning = Planning::findOrFail($id);
        $planning->delete();
        return response()->json(['message' => 'Planificación eliminada exitosamente']);
    }
}

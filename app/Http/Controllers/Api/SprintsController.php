<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SprintsRequest;
use App\Http\Resources\Api\SprintsResource;
use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintsController extends Controller
{
    public function index()
    {
        return SprintsResource::collection(Sprint::all());
    }

    public function store(SprintsRequest $request)
    {
        $sprint = Sprint::create($request->validated());
        return new SprintsResource($sprint);
    }

    public function show($id)
    {
        $sprint = Sprint::findOrFail($id);
        return new SprintsResource($sprint);
    }

    public function update(SprintsRequest $request, $id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->update($request->all());
        return new SprintsResource($sprint);
    }

    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->delete();
        return response()->json(['message' => 'Sprint eliminado exitosamente']);
    }
}

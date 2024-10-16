<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TrackingsRequest;
use App\Http\Resources\Api\TrackingResource;
use App\Models\Tracking;

class TrackingsController extends Controller
{
    public function index()
    {
        return TrackingResource::collection(Tracking::all());
    }

    public function store(TrackingsRequest $request)
    {
        $tracking = Tracking::create($request->validated());
        return new TrackingResource($tracking);
    }

    public function show($id)
    {
        $tracking = Tracking::findOrFail($id);
        return new TrackingResource($tracking);
    }

    public function update(TrackingsRequest $request, $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->update($request->all());
        return new TrackingResource($tracking);
    }

    public function destroy($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return response()->json(['message' => 'Seguimiento eliminado exitosamente']);
    }
}

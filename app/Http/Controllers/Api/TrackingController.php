<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TrackingRequest;
use App\Http\Resources\Api\TrackingResource;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function index()
    {
        return TrackingResource::collection(Tracking::all());
    }

    public function store(TrackingRequest $request)
    {
        return new TrackingResource(Tracking::create($request->all()));
    }

    public function show(Tracking $tracking)
    {
        return new TrackingResource($tracking);
    }

    public function update(TrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());
        return new TrackingResource($tracking);
    }

    public function destroy(Tracking $tracking)
    {
        $tracking->delete();
        return response()->json(['message' => 'Seguimiento eliminado exitosamente']);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StatusRequest;
use App\Http\Resources\Api\StatusResource;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        return StatusResource::collection(Status::all());
    }

    public function store(StatusRequest $request)
    {
        return new StatusResource(Status::create($request->all()));
    }

    public function show(Status $status)
    {
        return new StatusResource($status);
    }

    public function update(StatusRequest $request, Status $status)
    {
        $status->update($request->all());
        return new StatusResource($status);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return response()->json(['message' => 'Estado eliminado exitosamente']);
    }
}

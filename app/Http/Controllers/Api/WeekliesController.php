<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WeekliesRequest;
use App\Http\Resources\Api\WeekliesResource;
use App\Models\Weekly;

class WeekliesController extends Controller
{
    public function index()
    {
        return WeekliesResource::collection(Weekly::all());
    }

    public function store(WeekliesRequest $request)
    {
        return new WeekliesResource(Weekly::create($request->all()));
    }

    public function show(Weekly $weeklie)
    {
        return new WeekliesResource($weeklie);
    }

    public function update(WeekliesRequest $request, Weekly $weeklie)
    {
        $weeklie->update($request->all());
        return new WeekliesResource($weeklie);
    }

    public function destroy(Weekly $weeklie)
    {
        $weeklie->delete();
        return response()->json(['message' => 'Semana eliminada exitosamente']);
    }
}

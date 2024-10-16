<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WeekliesRequest;
use App\Http\Resources\Api\WeekliesResource;
use App\Models\Weekly;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $weeklie = Weekly::findOrFail($id);
        return new WeekliesResource($weeklie);
    }

    public function update(WeekliesRequest $request, $id)
    {
        $weeklie = Weekly::findOrFail($id);
        $weeklie->update($request->all());
        return new WeekliesResource($weeklie);
    }

    public function destroy($id)
    {
        $weeklie = Weekly::findOrFail($id);
        $weeklie->delete();
        return response()->json(['message' => 'Semana eliminada exitosamente']);
    }
}

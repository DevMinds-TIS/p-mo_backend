<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SiscodeRequest;
use App\Http\Resources\Api\SiscodeResource;
use App\Models\Siscode;

class SiscodeController extends Controller
{
    public function index()
    {
        return SiscodeResource::collection(Siscode::all());
    }

    public function store(SiscodeRequest $request)
    {
        return new SiscodeResource(Siscode::create($request->all()));
    }

    public function show(Siscode $siscode)
    {
        return new SiscodeResource($siscode);
    }

    public function update(SiscodeRequest $request, Siscode $siscode)
    {
        $siscode->update($request->all());
        return new SiscodeResource($siscode);
    }

    public function destroy(Siscode $siscode)
    {
        $siscode->delete();
        return response()->json(['message' => 'Código SIS eliminado exitosamente']);
    }
}

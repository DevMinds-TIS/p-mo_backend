<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CriterionsRequest;
use App\Http\Resources\Api\CriterionsResource;
use App\Models\Criterion;

class CriterionsController extends Controller
{
    public function index()
    {
        return CriterionsResource::collection(Criterion::all());
    }

    public function store(CriterionsRequest $request)
    {
        return new CriterionsResource(Criterion::create($request->all()));
    }

    public function show($id)
    {
        $crtiria = Criterion::findOrFail($id);
        return new CriterionsResource($crtiria);
    }

    public function update(CriterionsRequest $request, $id)
    {
        $crtiria = Criterion::findOrFail($id);
        $crtiria->update($request->all());
        return new CriterionsResource($crtiria);
    }

    public function destroy($id)
    {
        $crtiria = Criterion::findOrFail($id);
        $crtiria->delete();
        return response()->json(['message' => 'Criterio eliminado exitosamente']);
    }
}

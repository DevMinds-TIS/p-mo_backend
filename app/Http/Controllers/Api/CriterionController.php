<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CriterionRequest;
use App\Http\Resources\Api\CriterionResource;
use App\Models\Criterion;

class CriterionController extends Controller
{
    public function index()
    {
        return CriterionResource::collection(Criterion::all());
    }

    public function store(CriterionRequest $request)
    {
        return new CriterionResource(Criterion::create($request->all()));
    }

    public function show(Criterion $criteria)
    {
        return new CriterionResource($criteria);
    }

    public function update(CriterionRequest $request, Criterion $criteria)
    {
        $criteria->update($request->all());
        return new CriterionResource($criteria);
    }

    public function destroy(Criterion $criteria)
    {
        $criteria->delete();
        return response()->json(['message' => 'Criterio eliminado exitosamente']);
    }
}

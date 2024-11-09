<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CrossEvaluationRequest;
use App\Http\Resources\Api\CrossEvaluationResource;
use App\Models\CrossEvaluation;

class CrossEvaluationController extends Controller
{
    public function index()
    {
        return CrossEvaluationResource::collection(CrossEvaluation::all());
    }

    public function store(CrossEvaluationRequest $request)
    {
        return new CrossEvaluationResource(CrossEvaluation::create($request->all()));
    }

    public function show(CrossEvaluation $crossEvaluation)
    {
        return new CrossEvaluationResource($crossEvaluation);
    }

    public function update(CrossEvaluationRequest $request, CrossEvaluation $crossEvaluation)
    {
        $crossEvaluation->update($request->all());
        return new CrossEvaluationResource($crossEvaluation);
    }

    public function destroy(CrossEvaluation $crossEvaluation)
    {
        $crossEvaluation->delete();
        return response()->json(['message' => 'Evaluacion cruzada eliminada exitosamente']);
    }
}

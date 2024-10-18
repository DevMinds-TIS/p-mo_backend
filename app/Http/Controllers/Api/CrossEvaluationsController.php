<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CrossEvaluationRequest;
use App\Http\Resources\Api\CrossEvaluationsResource;
use App\Models\CrossEvaluation;
use Illuminate\Http\Request;

class CrossEvaluationsController extends Controller
{
    public function index()
    {
        return CrossEvaluationsResource::collection(CrossEvaluation::all());
    }

    public function store(CrossEvaluationRequest $request)
    {
        return new CrossEvaluationsResource(CrossEvaluation::create($request->all()));
    }

    public function show($id)
    {
        $crossEvaluation = CrossEvaluation::findOrFail($id);
        return new CrossEvaluationsResource($crossEvaluation);
    }

    public function update(CrossEvaluationRequest $request, $id)
    {
        $crossEvaluation = CrossEvaluation::findOrFail($id);
        $crossEvaluation->update($request->all());
        return new CrossEvaluationsResource($crossEvaluation);
    }

    public function destroy($id)
    {
        $crossEvaluation = CrossEvaluation::findOrFail($id);
        $crossEvaluation->delete();
        return response()->json(['message' => 'Evaluacion cruzada eliminada exitosamente']);
    }
}

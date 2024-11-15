<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PeerEvaluationRequest;
use App\Http\Resources\Api\PeerEvaluationResource;
use App\Models\PeerEvaluation;

class PeerEvaluationsController extends Controller
{
    public function index()
    {
        return PeerEvaluationResource::collection(PeerEvaluation::all());
    }

    public function store(PeerEvaluationRequest $request)
    {
        return new PeerEvaluationResource(PeerEvaluation::create($request->all()));
    }

    public function show(PeerEvaluation $peerEvaluation)
    {
        return new PeerEvaluationResource($peerEvaluation);
    }

    public function update(PeerEvaluationRequest $request, PeerEvaluation $peerEvaluation)
    {
        $peerEvaluation->update($request->all());
        return new PeerEvaluationResource($peerEvaluation);
    }

    public function destroy(PeerEvaluation $peerEvaluation)
    {
        $peerEvaluation->delete();
        return response()->json(['message' => 'Evaluación de pares eliminada exitosamente']);
    }
}

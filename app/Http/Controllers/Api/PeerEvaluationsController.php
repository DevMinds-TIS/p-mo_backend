<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PeerEvaluationsRequest;
use App\Http\Resources\Api\PeerEvaluationsResource;
use App\Models\PeerEvaluation;

class PeerEvaluationsController extends Controller
{
    public function index()
    {
        return PeerEvaluationsResource::collection(PeerEvaluation::all());
    }

    public function store(PeerEvaluationsRequest $request)
    {
        return new PeerEvaluationsResource(PeerEvaluation::create($request->all()));
    }

    public function show($id)
    {
        $peerEvaluations = PeerEvaluation::findOrFail($id);
        return new PeerEvaluationsResource($peerEvaluations);
    }

    public function update(PeerEvaluationsRequest $request, $id)
    {
        $peerEvaluations = PeerEvaluation::findOrFail($id);
        $peerEvaluations->update($request->all());
        return new PeerEvaluationsResource($peerEvaluations);
    }

    public function destroy($id)
    {
        $peerEvaluations = PeerEvaluation::findOrFail($id);
        $peerEvaluations->delete();
        return response()->json(['message' => 'Evaluación de pares eliminada exitosamente']);
    }
}

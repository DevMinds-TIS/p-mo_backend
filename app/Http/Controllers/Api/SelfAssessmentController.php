<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SelfAssessmentRequest;
use App\Http\Resources\Api\SelfAssessmentResource;
use App\Models\SelfAssessment;

class SelfAssessmentsController extends Controller
{
    public function index()
    {
        return SelfAssessmentResource::collection(SelfAssessment::all());
    }

    public function store(SelfAssessmentRequest $request)
    {
        return new SelfAssessmentResource(SelfAssessment::create($request->all()));
    }

    public function show(SelfAssessment $selfAssessment)
    {
        return new SelfAssessmentResource($selfAssessment);
    }

    public function update(SelfAssessmentRequest $request, SelfAssessment $selfAssessment)
    {
        $selfAssessment->update($request->all());
        return new SelfAssessmentResource($selfAssessment);
    }

    public function destroy(SelfAssessment $selfAssessment)
    {
        $selfAssessment->delete();
        return response()->json(['message' => 'Autoevaluación eliminada exitosamente']);
    }
}

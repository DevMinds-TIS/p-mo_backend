<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SelfAssessmentsReques;
use App\Http\Resources\Api\SelfAssessmentsResource;
use App\Models\SelfAssessment;

class SelfAssessmentsController extends Controller
{
    public function index()
    {
        return SelfAssessmentsResource::collection(SelfAssessment::all());
    }

    public function store(SelfAssessmentsReques $request)
    {
        return new SelfAssessmentsResource(SelfAssessment::create($request->all()));
    }

    public function show($id)
    {
        $selfAssessment = SelfAssessment::findOrFail($id);
        return new SelfAssessmentsResource($selfAssessment);
    }

    public function update(SelfAssessmentsReques $request, $id)
    {
        $selfAssessment = SelfAssessment::findOrFail($id);
        $selfAssessment->update($request->all());
        return new SelfAssessmentsResource($selfAssessment);
    }

    public function destroy($id)
    {
        $selfAssessment = SelfAssessment::findOrFail($id);
        $selfAssessment->delete();
        return response()->json(['message' => 'Autoevaluación eliminada exitosamente']);
    }
}

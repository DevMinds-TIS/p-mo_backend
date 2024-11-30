<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ScoreRequest;
use App\Http\Resources\Api\ScoreResource;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        return ScoreResource::collection(Score::all());
    }

    public function store(ScoreRequest $request)
    {
        return new ScoreResource(Score::create($request->all()));
    }

    public function show(Score $score)
    {
        return new ScoreResource($score);
    }

    public function update(ScoreRequest $request, Score $score)
    {
        $score->update($request->all());
        return new ScoreResource($score);
    }

    public function destroy(Score $score)
    {
        $score->delete();
        return response()->json(['message' => 'La puntuación fue eliminada exitosamente']);
    }
}

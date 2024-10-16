<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoriesRequest;
use App\Http\Resources\Api\StoriesResource;
use App\Models\Story;

class StoriesController extends Controller
{
    public function index()
    {
        return StoriesResource::collection(Story::all());
    }

    public function store(StoriesRequest $request)
    {
        return new StoriesResource(Story::create($request->all()));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return new StoriesResource($story);
    }

    public function update(StoriesRequest $request, $id)
    {
        $story = Story::findOrFail($id);
        $story->update($request->all());
        return new StoriesResource($story);
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return response()->json(['message' => 'Historia eliminada exitosamente']);
    }
}

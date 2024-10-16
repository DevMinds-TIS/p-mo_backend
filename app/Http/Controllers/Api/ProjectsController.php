<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectRequest;
use App\Http\Resources\Api\ProjectResource;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(ProjectRequest $request)
    {
        return new ProjectResource(Project::create($request->all()));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return new ProjectResource($project);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return new ProjectResource($project);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Proyecto eliminado exitosamente']);
    }
}

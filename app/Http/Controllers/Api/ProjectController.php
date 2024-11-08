<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectRequest;
use App\Http\Resources\Api\ProjectResource;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(ProjectRequest $request)
    {
        // Crear el proyecto
        $project = Project::create($request->all());

        // Array de documentos
        $documents = [
            'invitation' => 'Invitación del proyecto',
            'specification' => 'Pliego de especificaciones'
        ];

        // Guardar documentos
        foreach ($documents as $field => $documentName) {
            if ($request->hasFile($field)) {
                Log::info("Archivo recibido: " . $field); // Log para depuración
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $filename, 'public');
                Document::create([
                    'idproject' => $project->idproject,
                    'pathdocument' => $path,
                    'namedocument' => $documentName
                ]);
            } else {
                Log::info("Archivo no recibido: " . $field); // Log para depuración
            }
        }

        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Proyecto eliminado exitosamente']);
    }
}

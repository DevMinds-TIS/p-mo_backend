<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        if ($projects->isEmpty()) {
            $data = [
                "message" => "No se encontraron proyectos",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'project' => $projects,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del request
        $validatedData = Validator::make($request->all(), [
            'iduser' => 'required|integer|exists:users,iduser',
            'nameproject' => 'required|string|max:120',
            'codeproject' => 'required|string|max:30|unique:projects,codeproject',
            'startproject' => 'required|date',
            'endproject' => 'nullable|date|after_or_equal:startproject',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], 400);
        }

        // Crear un nuevo proyecto con los datos validados
        $project = Project::create([
            'iduser' => $request->iduser,
            'nameproject' => $request->nameproject,
            'codeproject' => $request->codeproject,
            'startproject' => $request->startproject,
            'endproject' => $request->endproject,
        ]);

        // Responder con el proyecto creado
        return response()->json(['message' => 'Proyecto creado exitosamente', 'project' => $project], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}

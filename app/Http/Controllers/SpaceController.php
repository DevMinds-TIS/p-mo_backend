<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = Space::all();

        if ($spaces->isEmpty()) {
            $data = [
                "message" => "No se encontraron espacios de docentes",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'space' => $spaces,
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
        $validator = Validator::make($request->all(), [
            'idproject' => 'required|integer|exists:projects,idproject',
            'namespace' => 'required|string|max:60',
            'startspace' => 'required|date',
            'endspace' => 'nullable|date|after_or_equal:startspace',
            'starregistrationspace' => 'nullable|date',
            'endregistrationspace' => 'nullable|date|after_or_equal:starregistrationspace',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear un nuevo espacio con los datos validados
        $space = Space::create($validator->validated());

        // Responder con el espacio creado
        return response()->json(['message' => 'Espacio creado exitosamente', 'space' => $space], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function show(Space $space)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function edit(Space $space)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Space $space)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function destroy(Space $space)
    {
        //
    }
}

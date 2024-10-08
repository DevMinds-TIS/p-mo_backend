<?php

namespace App\Http\Controllers;

use App\Models\Weekly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeklies = Weekly::all();

        if ($weeklies->isEmpty()) {
            $data = [
                "message" => "No se encontraron planillas de evaluación semanales",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            'weekly' => $weeklies,
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
            'idsprint' => 'required|integer|exists:sprints,idsprint',
            'goalweeklie' => 'required|string|max:90',
            'startweeklie' => 'required|date',
            'endweeklie' => 'nullable|date|after_or_equal:startweeklie',
            'statusweeklie' => 'required|string|max:90',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear una nueva entrada semanal con los datos validados
        $weekly = Weekly::create($validator->validated());

        // Responder con la entrada semanal creada
        return response()->json(['message' => 'Entrada semanal creada exitosamente', 'weekly' => $weekly], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weekly  $weekly
     * @return \Illuminate\Http\Response
     */
    public function show(Weekly $weekly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weekly  $weekly
     * @return \Illuminate\Http\Response
     */
    public function edit(Weekly $weekly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weekly  $weekly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weekly $weekly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weekly  $weekly
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weekly $weekly)
    {
        //
    }
}

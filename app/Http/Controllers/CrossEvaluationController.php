<?php

namespace App\Http\Controllers;

use App\Models\CrossEvaluation;
use Illuminate\Http\Request;

class CrossEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crossEvaluations = CrossEvaluation::all();

        if($crossEvaluations->isEmpty()){
            $data = [
                "message" => "No se encontraron evaluaciones cruzadas",
                "status" => 200
            ];
            return response()->json($data, 200);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrossEvaluation  $crossEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(CrossEvaluation $crossEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrossEvaluation  $crossEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(CrossEvaluation $crossEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrossEvaluation  $crossEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrossEvaluation $crossEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrossEvaluation  $crossEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrossEvaluation $crossEvaluation)
    {
        //
    }
}

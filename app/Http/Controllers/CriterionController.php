<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterions = Criterion::all();

        if($criterions->isEmpty()){
            $data = [
                "message" => "No se encontraron criterios",
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
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function show(Criterion $criterion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function edit(Criterion $criterion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criterion $criterion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criterion $criterion)
    {
        //
    }
}

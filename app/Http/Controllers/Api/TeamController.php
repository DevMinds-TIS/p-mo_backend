<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamRequest;
use App\Http\Resources\Api\TeamResource;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        return TeamResource::collection(Team::all());
    }

    public function store(TeamRequest $request)
    {
        $teamData = $request->all();

        // Manejo de archivo del logo del equipo
        if ($request->hasFile('logoteam')) {
            $file = $request->file('logoteam');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $teamData['logoteam'] = $path;
        }

        $team = Team::create($teamData);

        return new TeamResource($team);
    }

    public function show(Team $team,)
    {
        return new TeamResource($team);
    }

    public function update(TeamRequest $request, Team $team)
    {
        // Manejo de archivo del logo del equipo
        if ($request->hasFile('logoteam')) {
            $file = $request->file('logoteam');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $team->logoteam = $path;
        }

        $team->update($request->except('logoteam'));

        return new TeamResource($team);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(['message' => 'Equipo eliminado exitosamente']);
    
    }
}

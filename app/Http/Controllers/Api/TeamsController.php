<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamsRequest;
use App\Http\Resources\Api\TeamsResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        return TeamsResource::collection(Team::all());
    }

    public function store(TeamsRequest $request)
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

        return new TeamsResource($team);
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return new TeamsResource($team);
    }

    public function update(TeamsRequest $request, $id)
    {
        $team = Team::findOrFail($id);

        // Manejo de archivo del logo del equipo
        if ($request->hasFile('logoteam')) {
            $file = $request->file('logoteam');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $team->logoteam = $path;
        }

        $team->update($request->except('logoteam'));

        return new TeamsResource($team);
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return response()->json(['message' => 'Equipo eliminado exitosamente']);
    
    }
}

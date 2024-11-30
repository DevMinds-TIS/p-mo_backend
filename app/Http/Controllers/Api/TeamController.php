<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamRequest;
use App\Http\Resources\Api\TeamResource;
use App\Models\RoleUser;
use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    public function index()
    {
        return TeamResource::collection(Team::all());
    }

    public function store(TeamRequest $request)
    {
        Log::info('Inicio del método store en TeamController', ['request_data' => $request->all()]);

        $teamData = $request->all();

        // Manejo de archivo del logo del equipo
        if ($request->hasFile('logoteam')) {
            $file = $request->file('logoteam');
            $filename = time() . '_' . $file->getClientOriginalName();
            Log::info('Archivo de logo recibido', ['original_filename' => $file->getClientOriginalName(), 'stored_filename' => $filename]);

            $path = $file->storeAs('logos', $filename, 'public');
            $teamData['logoteam'] = $path;
            Log::info('Ruta de almacenamiento del logo', ['path' => $path]);
        }

        Log::info('Datos del equipo antes de crear', ['team_data' => $teamData]);

        // Crear el equipo
        $team = Team::create($teamData);

        Log::info('Equipo creado', ['team' => $team]);

        // Crear miembro del equipo con iduser
        if (isset($teamData['iduser'])) {
            $teamMemberData = [
                'idteam' => $team->idteam,
                'iduser' => $teamData['iduser'],
            ];
            $teamMember = TeamMember::create($teamMemberData);
            Log::info('Miembro del equipo creado', ['team_member' => $teamMember]);

            // Asignar rol de 'Representante legal'
            $roleUserData = [
                'idteammember' => $teamMember->idteammember,
                'iduser' => $teamData['iduser'],
                'idrol' => 4, // ID del rol 'Representante legal'
            ];
            $roleUser = RoleUser::create($roleUserData);
            Log::info('Rol asignado al usuario', ['role_user' => $roleUser]);
        }

        return new TeamResource($team);
    }

    public function show(Team $team,)
    {
        return new TeamResource($team);
    }

    public function update(TeamRequest $request, Team $team)
    {
        Log::info('Datos recibidos para actualizar el equipo', ['data' => $request->all()]);
        
        // Manejo de archivo del logo del equipo
        if ($request->hasFile('logoteam')) {
            $file = $request->file('logoteam');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $team->logoteam = $path;
        }
    
        Log::info('Datos del equipo antes de actualizar', ['team_data' => $team]);
    
        // Actualizar el equipo con los datos restantes
        $team->update($request->except('logoteam'));
    
        Log::info('Datos actualizados del equipo', ['team' => $team]);
    
        return new TeamResource($team);
    }    

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(['message' => 'Equipo eliminado exitosamente']);
    }
}

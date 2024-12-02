<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamMemberRequest;
use App\Http\Resources\Api\RoleUserResource;
use App\Http\Resources\Api\TeamMemberResource;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\TeamMember;
use Illuminate\Validation\ValidationException;

class TeamMemberController extends Controller
{
    public function index()
    {
        return TeamMemberResource::collection(TeamMember::all());
    }

    // public function store(TeamMemberRequest $request)
    // {
    //     return new TeamMemberResource(TeamMember::create($request->all()));
    // }

    public function store(TeamMemberRequest $request)
    {
        // Validar que el namerol esté presente en la solicitud
        $namerol = $request->input('namerol');
        if (!$namerol) {
            throw ValidationException::withMessages(['namerol' => 'El nombre del rol es requerido.']);
        }
        // Obtener el idrol basado en el namerol proporcionado
        $role = Role::where('namerol', $namerol)->first();
        if (!$role) {
            throw ValidationException::withMessages(['namerol' => 'El nombre del rol no es válido.']);
        }
        // Crear el nuevo miembro del equipo
        $teamMember = TeamMember::create($request->validated());
        // Asignar el rol al nuevo miembro del equipo
        $roleUser = RoleUser::create([
            'idteammember' => $teamMember->idteammember,
            'iduser' => $teamMember->iduser,
            'idrol' => $role->idrol,
        ]);
        return response()->json(['team_member' => new TeamMemberResource($teamMember), 'role_user' => new RoleUserResource($roleUser),]);
    }

    public function show(TeamMember $teamMember)
    {
        return new TeamMemberResource($teamMember);
    }

    public function update(TeamMemberRequest $request, TeamMember $teamMember)
    {
        $teamMember->update($request->all());
        return new TeamMemberResource($teamMember);
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return response()->json(['message' => 'Miembro del equipo eliminado exitosamente']);
    }
}

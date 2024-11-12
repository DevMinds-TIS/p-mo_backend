<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamMemberRequest;
use App\Http\Resources\Api\TeamMemberResource;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        return TeamMemberResource::collection(TeamMember::all());
    }

    public function store(TeamMemberRequest $request)
    {
        return new TeamMemberResource(TeamMember::create($request->all()));
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeamMemberRequest;
use App\Http\Resources\Api\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return new TeamMemberResource($teamMember);
    }

    public function update(TeamMemberRequest $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->update($request->all());
        return new TeamMemberResource($teamMember);
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();
        return response()->json(['message' => 'Miembro del equipo eliminado exitosamente']);
    }
}

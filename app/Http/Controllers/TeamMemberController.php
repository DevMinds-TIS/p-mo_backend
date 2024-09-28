<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    // Obtener todos los miembros del equipo
    public function index()
    {
        return TeamMember::with('user')->get();
    }

    // Crear un nuevo miembro del equipo
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:255',
        ]);

        return TeamMember::create($request->all());
    }

    // Mostrar un miembro específico del equipo
    public function show($id)
    {
        return TeamMember::with('user')->findOrFail($id);
    }

    // Actualizar un miembro del equipo existente
    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->update($request->all());

        return $teamMember;
    }

    // Eliminar un miembro del equipo
    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();

        return response()->json(['message' => 'Team Member deleted successfully']);
    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Sprint;
use Illuminate\Http\Request;
class SprintController extends Controller
{
    // Método para obtener todos los sprints
    public function index()
    {
        $sprints = Sprint::with('Tarea', 'Documento')->get(); // Asegúrate de cargar relaciones
        return response()->json([
            'status' => 200,
            'data' => $sprints
        ]);
    }
    // Método para crear un nuevo sprint
    public function store(Request $request)
    {
        // Validar la entrada
        $validatedData = $request->validate([
            'idproyecto' => 'required|exists:Proyecto,id', // Verifica que el proyecto exista
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechainiciosprint' => 'required|date',
            'fechafinsprint' => 'required|date|after:fechainiciosprint', // Asegúrate de que la fecha de fin sea posterior a la de inicio
        ]);
        // Crear el nuevo sprint
        $sprint = Sprint::create($validatedData);
        return response()->json([
            'status' => 201,
            'data' => $sprint
        ]);
    }
    // Mostrar un sprint específico
    public function show($id)
    {
        $sprint = Sprint::with('Tarea', 'Documento')->findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $sprint
        ]);
    }
    // Actualizar un sprint existente
    public function update(Request $request, $id)
    {
        $sprint = Sprint::findOrFail($id);
        
        // Validar la entrada
        $validatedData = $request->validate([
            'idproyecto' => 'nullable|exists:projects,id',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'fechainiciosprint' => 'nullable|date',
            'fechafinsprint' => 'nullable|date|after:fechainiciosprint',
        ]);
        $sprint->update($validatedData);
        return response()->json([
            'status' => 200,
            'data' => $sprint
        ]);
    }
    // Eliminar un sprint
    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->delete();
        return response()->json(['message' => 'Sprint eliminado exitosamente', 'status' => 204]);
    }
}



<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SiscodeRequest;
use App\Http\Requests\Api\SpaceRequest;
use App\Http\Resources\Api\SpaceResource;
use App\Models\Document;
use App\Models\Space;
use Illuminate\Support\Facades\Log;

class SpaceController extends Controller
{
    public function index()
    {
        return SpaceResource::collection(Space::all());
    }

    public function store(SpaceRequest $request)
    {

        // Crear el espacio
        $space = Space::create($request->all());

        // Array de documentos
        $documents = [
            'registered' => 'Inscritos',
        ];

        // Guardar documentos
        foreach ($documents as $field => $documentName) {
            if ($request->hasFile($field)) {
                Log::info("Archivo recibido: " . $field); // Log para depuración
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $filename, 'public');
                Document::create([
                    'idspace' => $space->idspace,
                    'pathdocument' => $path,
                    'namedocument' => $documentName
                ]);
            } else {
                Log::info("Archivo no recibido: " . $field); // Log para depuración
            }
        }

        // Llamar a la función store de SiscodeController 
        $siscodeController = new SiscodeController(); 
        // $siscodeRequest = new \Illuminate\Http\Request();
        $siscodeRequest = new SiscodeRequest(); 
        $siscodeRequest->replace(['idspace' => $space->idspace]);

        $response = $siscodeController->store($siscodeRequest); 
        if ($response->getStatusCode() !== 200) { 
            return response()->json(['error' => 'Error al procesar el PDF'], 500); 
        }

        return new SpaceResource($space);
    }

    public function show(Space $space)
    {
        return new SpaceResource($space);
    }

    public function update(SpaceRequest $request, Space $space)
    {
        $space->update($request->all());
        return new SpaceResource($space);
    }

    public function destroy(Space $space)
    {
        $space->delete();
        return response()->json(['message' => 'Espacio del docente eliminado exitosamente']);
    }
}

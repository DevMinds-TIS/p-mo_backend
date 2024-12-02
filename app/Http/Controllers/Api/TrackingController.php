<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TrackingRequest;
use App\Http\Resources\Api\TrackingResource;
use App\Models\Document;
use App\Models\Tracking;
use Illuminate\Support\Facades\Log;

class TrackingController extends Controller
{
    public function index()
    {
        return TrackingResource::collection(Tracking::all());
    }

    public function store(TrackingRequest $request)
{
    // Crear el seguimiento
    $tracking = Tracking::create($request->all());

    // Si se ha subido un documento, guardarlo
    if ($request->hasFile('document')) {
        Log::info("Archivo recibido: document");
        $file = $request->file('document');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('documents', $filename, 'public');
        
        Document::create([
            'idtracking' => $tracking->idtracking,
            'idteam' => $tracking->idteam,
            'pathdocument' => $path,
            'namedocument' => $tracking->nametracking
        ]);
    } else {
        Log::info("Archivo no recibido: document");
    }

    return new TrackingResource($tracking);
}

    public function show(Tracking $tracking)
    {
        return new TrackingResource($tracking);
    }

    public function update(TrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());
        return new TrackingResource($tracking);
    }

    public function destroy(Tracking $tracking)
    {
        $tracking->delete();
        return response()->json(['message' => 'Seguimiento eliminado exitosamente']);
    }
}

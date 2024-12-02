<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DocumentRequest;
use App\Http\Resources\Api\DocumentResource;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return DocumentResource::collection(Document::all());
    }

    public function store(DocumentRequest $request)
    {
        // Verificar si se ha cargado un archivo
        if ($request->hasFile('pathdocument')) {
            $file = $request->file('pathdocument');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $filename, 'public');

            $document = Document::create([
                'idproject' => $request->input('idproject'),
                'idspace' => $request->input('idspace'),
                'idplanning' => $request->input('idplanning'),
                'idtracking' => $request->input('idtracking'),
                'idstorie' => $request->input('idstorie'),
                'idtask' => $request->input('idtask'),
                'idteam' => $request->input('idteam'),
                'pathdocument' => $path,
                'namedocument' => $request->input('namedocument')
            ]);

            return new DocumentResource($document);
        }

        return response()->json(['message' => 'No se ha cargado ningún archivo'], 400);
        return new DocumentResource(Document::create($request->all()));
    }

    public function show(Document $document)
    {
        $filePath = storage_path('app/public/' . $document->pathdocument);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath);
    }

    public function update(DocumentRequest $request, Document $document)
    {
        if ($request->hasFile('pathdocument')) {
            $file = $request->file('pathdocument');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $filename, 'public');
            $document->pathdocument = $path;
        }
        $document->update($request->except('pathdocument'));
        // $document->update($request->all());
        return new DocumentResource($document);
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return response()->json(['message' => 'Documento eliminado exitosamente']);
    }
}

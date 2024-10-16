<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DocumentsRequest;
use App\Http\Resources\Api\DocumentsResource;
use App\Models\Document;

class DocumentsController extends Controller
{
    public function index()
    {
        return DocumentsResource::collection(Document::all());
    }

    public function store(DocumentsRequest $request)
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
                'pathdocument' => $path,
            ]);

            return new DocumentsResource($document);
        }

        return response()->json(['message' => 'No se ha cargado ningún archivo'], 400);
        return new DocumentsResource(Document::create($request->all()));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return new DocumentsResource($document);
    }

    public function update(DocumentsRequest $request, $id)
    {
        $document = Document::findOrFail($id);
        if ($request->hasFile('pathdocument')) {
            $file = $request->file('pathdocument');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $filename, 'public');
            $document->pathdocument = $path;
        }
        $document->update($request->except('pathdocument'));
        // $document->update($request->all());
        return new DocumentsResource($document);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return response()->json(['message' => 'Documento eliminado exitosamente']);
    }
}

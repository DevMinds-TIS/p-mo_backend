<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,docx,pptx|max:2048', // 2MB máximo
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Aquí puedes manejar el archivo subido
        $file = $request->file('file');
        $filePath = $file->store('uploads');

        return back()->with('success', 'Archivo subido exitosamente!');
    }
}

<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'iduser' => 'nullable|integer|exists:users,iduser',
            'nameproject' => 'required|string|max:120',
            'codeproject' => 'required|string|max:30|unique:projects,codeproject',
            'termproject' => 'nullable|string|max:20',
            'startproject' => 'nullable|date',
            'endproject' => 'nullable|date|after_or_equal:startproject',
        ];
    }

    public function messages()
    {
        return [
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'nameproject.required' => 'El nombre del proyecto es obligatorio.',
            'nameproject.string' => 'El nombre del proyecto debe ser una cadena de texto.',
            'nameproject.max' => 'El nombre del proyecto no debe superar los 120 caracteres.',
            'codeproject.required' => 'El código del proyecto es obligatorio.',
            'codeproject.string' => 'El código del proyecto debe ser una cadena de texto.',
            'codeproject.max' => 'El código del proyecto no debe superar los 30 caracteres.',
            'codeproject.unique' => 'El código del proyecto ya está en uso.',
            'termproject.string' => 'El término del proyecto debe ser una cadena de texto.',
            'termproject.max' => 'El término del proyecto no debe superar los 20 caracteres.',
            'startproject.date' => 'La fecha de inicio del proyecto debe ser una fecha válida.',
            'endproject.date' => 'La fecha de finalización del proyecto debe ser una fecha válida.',
            'endproject.after_or_equal' => 'La fecha de finalización del proyecto debe ser igual o posterior a la fecha de inicio.',
        ];
    }
}

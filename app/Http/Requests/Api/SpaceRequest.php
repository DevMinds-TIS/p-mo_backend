<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SpaceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idproject' => 'nullable|integer|exists:projects,idproject',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'namespace' => 'required|string|max:60',
            'startspace' => 'nullable|date',
            'endspace' => 'nullable|date|after_or_equal:startspace',
            'limitspace' => 'nullable|integer|min:0',
            'starregistrationspace' => 'nullable|date',
            'endregistrationspace' => 'nullable|date|after_or_equal:starregistrationspace',
        ];
    }

    public function messages()
    {
        return [
            'idproject.integer' => 'El ID del proyecto debe ser un número entero.',
            'idproject.exists' => 'El proyecto seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'namespace.required' => 'El nombre del espacio es obligatorio.',
            'namespace.string' => 'El nombre del espacio debe ser una cadena de texto.',
            'namespace.max' => 'El nombre del espacio no debe superar los 60 caracteres.',
            'startspace.date' => 'La fecha de inicio debe ser una fecha válida.',
            'endspace.date' => 'La fecha de finalización debe ser una fecha válida.',
            'endspace.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'limitspace.integer' => 'El límite del espacio debe ser un número entero.',
            'limitspace.min' => 'El límite del espacio no puede ser negativo.',
            'starregistrationspace.date' => 'La fecha de inicio de registro debe ser una fecha válida.',
            'endregistrationspace.date' => 'La fecha de finalización de registro debe ser una fecha válida.',
            'endregistrationspace.after_or_equal' => 'La fecha de finalización de registro debe ser igual o posterior a la fecha de inicio de registro.',
        ];
    }
}

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
            'limitspace' => 'nullable|integer',
            'starregistrationspace' => 'nullable|date',
            'endregistrationspace' => 'nullable|date|after_or_equal:starregistrationspace',
        ];
    }

    public function messages()
    {
        return [
            'idproject.required' => 'El ID del proyecto es obligatorio.',
            'idproject.integer' => 'El ID del proyecto debe ser un número entero.',
            'idproject.exists' => 'El proyecto no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario no existe.',
            'namespace.required' => 'El nombre del espacio es obligatorio.',
            'namespace.string' => 'El nombre del espacio debe ser una cadena de texto.',
            'namespace.max' => 'El nombre del espacio no puede tener más de 60 caracteres.',
            'startspace.date' => 'La fecha de inicio del espacio debe ser una fecha válida.',
            'endspace.date' => 'La fecha de finalización del espacio debe ser una fecha válida.',
            'endspace.after_or_equal' => 'La fecha de finalización del espacio debe ser igual o posterior a la fecha de inicio.',
            'limitspace.integer' => 'El límite del espacio debe ser un número entero.',
            'starregistrationspace.date' => 'La fecha de inicio de registro debe ser una fecha válida.',
            'endregistrationspace.date' => 'La fecha de finalización de registro debe ser una fecha válida.',
            'endregistrationspace.after_or_equal' => 'La fecha de finalización de registro debe ser igual o posterior a la fecha de inicio de registro.',
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SprintRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idplanning' => 'nullable|integer|exists:planning,idplanning',
            'startsprint' => 'nullable|date',
            'endsprint' => 'nullable|date|after_or_equal:startsprint',
            'goalsprint' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'idplanning.integer' => 'El ID de la planificación debe ser un número entero.',
            'idplanning.exists' => 'La planificación seleccionada no existe.',
            'startsprint.date' => 'La fecha de inicio del sprint debe ser una fecha válida.',
            'endsprint.date' => 'La fecha de finalización del sprint debe ser una fecha válida.',
            'endsprint.after_or_equal' => 'La fecha de finalización del sprint debe ser igual o posterior a la fecha de inicio.',
            'goalsprint.string' => 'El objetivo del sprint debe ser una cadena de texto.',
            'goalsprint.max' => 'El objetivo del sprint no debe superar los 255 caracteres.',
        ];
    }
}

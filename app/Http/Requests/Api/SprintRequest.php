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
            'idplanning' => 'nullable|integer|exists:plannings,idplanning',
            'startsprint' => 'nullable|date_format:Y-m-d',
            'endsprint' => 'nullable|date_format:Y-m-d|after_or_equal:startsprint',
            'goalsprint' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'idplanning.integer' => 'El ID de la planificación debe ser un número entero.',
            'idplanning.exists' => 'La planificación seleccionada no existe.',
            'startsprint.date_format' => 'La fecha de inicio del sprint debe tener el formato Año-Mes-Día.',
            'endsprint.date_format' => 'La fecha de fin del sprint debe tener el formato Año-Mes-Día.',
            'endsprint.after_or_equal' => 'La fecha de fin del sprint debe ser igual o posterior a la fecha de inicio.',
            'goalsprint.string' => 'El objetivo del sprint debe ser una cadena de texto.',
            'goalsprint.max' => 'El objetivo del sprint no puede superar los 255 caracteres.',
        ];
    }
}

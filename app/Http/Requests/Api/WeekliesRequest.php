<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WeekliesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idsprint' => 'nullable|integer|exists:sprints,idsprint',
            'idstatus' => 'nullable|integer|exists:statuses,idstatus',
            'goalweeklie' => 'nullable|string|max:90',
            'startweeklie' => 'nullable|date',
            'endweeklie' => 'nullable|date|after_or_equal:startweeklie',
        ];
    }

    public function messages()
    {
        return [
            'idsprint.integer' => 'El ID del sprint debe ser un número entero.',
            'idsprint.exists' => 'El sprint seleccionado no existe.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'goalweeklie.string' => 'El objetivo del weekly debe ser una cadena de texto.',
            'goalweeklie.max' => 'El objetivo del weekly no debe superar los 90 caracteres.',
            'startweeklie.date' => 'La fecha de inicio del weekly debe ser una fecha válida.',
            'endweeklie.date' => 'La fecha de finalización del weekly debe ser una fecha válida.',
            'endweeklie.after_or_equal' => 'La fecha de finalización del weekly debe ser igual o posterior a la fecha de inicio.',
        ];
    }
}

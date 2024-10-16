<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WeekliesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idsprint' => 'nullable|integer|exists:sprints,idsprint',
            'goalweeklie' => 'nullable|string|max:90',
            'startweeklie' => 'nullable|date_format:Y-m-d',
            'endweeklie' => 'nullable|date_format:Y-m-d|after_or_equal:startweeklie',
            'statusweeklie' => 'nullable|string|max:90',
        ];
    }

    public function messages()
    {
        return [
            'idsprint.integer' => 'El ID del sprint debe ser un número entero.',
            'idsprint.exists' => 'El sprint seleccionado no existe.',
            'goalweeklie.string' => 'El objetivo semanal debe ser una cadena de texto.',
            'goalweeklie.max' => 'El objetivo semanal no puede superar los 90 caracteres.',
            'startweeklie.date_format' => 'La fecha de inicio semanal debe tener el formato Año-Mes-Día.',
            'endweeklie.date_format' => 'La fecha de fin semanal debe tener el formato Año-Mes-Día.',
            'endweeklie.after_or_equal' => 'La fecha de fin semanal debe ser igual o posterior a la fecha de inicio.',
            'statusweeklie.string' => 'El estado semanal debe ser una cadena de texto.',
            'statusweeklie.max' => 'El estado semanal no puede superar los 90 caracteres.',
        ];
    }
}

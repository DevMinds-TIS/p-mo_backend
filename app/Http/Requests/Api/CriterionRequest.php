<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CriterionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'namecriteria' => 'nullable|string|max:90',
            'scorecriteria' => 'nullable|integer',
            'commentcriteria' => 'nullable|string|max:180',
        ];
    }

    public function messages()
    {
        return [
            'namecriteria.required' => 'El nombre del criterio es obligatorio.',
            'namecriteria.string' => 'El nombre del criterio debe ser una cadena de texto.',
            'namecriteria.max' => 'El nombre del criterio no puede superar los 90 caracteres.',
            'scorecriteria.integer' => 'La puntuación del criterio debe ser un número entero.',
            'commentcriteria.string' => 'El comentario del criterio debe ser una cadena de texto.',
            'commentcriteria.max' => 'El comentario del criterio no puede superar los 180 caracteres.',
        ];
    }
}

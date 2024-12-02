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
            'idcategory' => 'nullable|integer|exists:category,idcategory',
            'namecriteria' => 'required|string|max:90',
            'scorecriteria' => 'nullable|integer|min:0',
            'commentcriteria' => 'nullable|string|max:180',
        ];
    }
    
    public function messages()
    {
        return [
            'idcategory.integer' => 'El ID de la categoría debe ser un número entero.',
            'idcategory.exists' => 'La categoría seleccionada no existe.',
            'namecriteria.required' => 'El nombre del criterio es obligatorio.',
            'namecriteria.string' => 'El nombre del criterio debe ser una cadena de texto.',
            'namecriteria.max' => 'El nombre del criterio no debe superar los 90 caracteres.',
            'scorecriteria.integer' => 'La puntuación del criterio debe ser un número entero.',
            'scorecriteria.min' => 'La puntuación del criterio no puede ser negativa.',
            'commentcriteria.string' => 'El comentario del criterio debe ser una cadena de texto.',
            'commentcriteria.max' => 'El comentario del criterio no debe superar los 180 caracteres.',
        ];
    }
}

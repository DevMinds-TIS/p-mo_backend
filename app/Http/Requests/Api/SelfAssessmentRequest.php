<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SelfAssessmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idcriteria' => 'nullable|integer|exists:criteria,idcriteria',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idplanning' => 'nullable|integer|exists:planning,idplanning',
            'datesa' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'idcriteria.integer' => 'El ID del criterio debe ser un número entero.',
            'idcriteria.exists' => 'El criterio seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idplanning.integer' => 'El ID de la planificación debe ser un número entero.',
            'idplanning.exists' => 'La planificación seleccionada no existe.',
            'datesa.date' => 'La fecha debe ser una fecha válida.',
        ];
    }
}

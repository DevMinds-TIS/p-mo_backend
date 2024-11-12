<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CrossEvaluationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idplanning' => 'nullable|integer|exists:plannings,idplanning',
            'idcriteria' => 'nullable|integer|exists:criteria,idcriteria',
            'idteam' => 'nullable|integer|exists:teams,idteam',
            'datece' => 'nullable|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'idplanning.integer' => 'El ID de la planificación debe ser un número entero.',
            'idplanning.exists' => 'La planificación seleccionada no existe.',
            'idcriteria.integer' => 'El ID del criterio debe ser un número entero.',
            'idcriteria.exists' => 'El criterio seleccionado no existe.',
            'idteam.integer' => 'El ID del equipo debe ser un número entero.',
            'idteam.exists' => 'El equipo seleccionado no existe.',
            'datece.date_format' => 'La fecha de la evaluación cruzada debe tener el formato Año-Mes-Día.',
        ];
    }
}

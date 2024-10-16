<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SelfAssessmentsReques extends FormRequest
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
            'idcriteria' => 'nullable|integer|exists:criteria,idcriteria',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idplanning' => 'nullable|integer|exists:plannings,idplanning',
            'datesa' => 'nullable|date_format:Y-m-d',
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
            'datesa.date_format' => 'La fecha de autoevaluación debe tener el formato Año-Mes-Día.',
        ];
    }
}

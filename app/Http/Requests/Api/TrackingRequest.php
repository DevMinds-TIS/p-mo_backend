<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TrackingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idsprint' => 'nullable|integer|exists:sprints,idsprint',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idstatus' => 'nullable|integer|exists:statuses,idstatus',
            'idteam' => 'nullable|integer|exists:teams,idteam',
            'nametracking' => 'required|string|max:90',
            'deliverytracking' => 'nullable|date',
            'returntracking' => 'nullable|date|after_or_equal:deliverytracking',
            'commenttracking' => 'nullable|string|max:180',
        ];
    }

    public function messages()
    {
        return [
            'idsprint.integer' => 'El ID del sprint debe ser un número entero.',
            'idsprint.exists' => 'El sprint seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'idteam.integer' => 'El ID del equipo debe ser un número entero.',
            'idteam.exists' => 'El equipo seleccionado no existe.',
            'nametracking.required' => 'El nombre del tracking es obligatorio.',
            'nametracking.string' => 'El nombre del tracking debe ser una cadena de texto.',
            'nametracking.max' => 'El nombre del tracking no debe superar los 90 caracteres.',
            'deliverytracking.date' => 'La fecha de entrega debe ser una fecha válida.',
            'returntracking.date' => 'La fecha de devolución debe ser una fecha válida.',
            'returntracking.after_or_equal' => 'La fecha de devolución debe ser igual o posterior a la fecha de entrega.',
            'commenttracking.string' => 'El comentario debe ser una cadena de texto.',
            'commenttracking.max' => 'El comentario no debe superar los 180 caracteres.',
        ];
    }
}

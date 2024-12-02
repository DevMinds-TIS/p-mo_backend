<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idstorie' => 'nullable|integer|exists:stories,idstorie',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idstatus' => 'nullable|integer|exists:statuses,idstatus',
            'nametask' => 'required|string|max:60',
            'starttask' => 'nullable|date',
            'endtask' => 'nullable|date|after_or_equal:starttask',
            'scoretask' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'idstorie.integer' => 'El ID de la historia debe ser un número entero.',
            'idstorie.exists' => 'La historia seleccionada no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'nametask.required' => 'El nombre de la tarea es obligatorio.',
            'nametask.string' => 'El nombre de la tarea debe ser una cadena de texto.',
            'nametask.max' => 'El nombre de la tarea no debe superar los 60 caracteres.',
            'starttask.date' => 'La fecha de inicio debe ser una fecha válida.',
            'endtask.date' => 'La fecha de finalización debe ser una fecha válida.',
            'endtask.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'scoretask.integer' => 'La puntuación de la tarea debe ser un número entero.',
            'scoretask.min' => 'La puntuación de la tarea no puede ser negativa.',
        ];
    }
}

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
            'nametask' => 'required|string|max:60',
            'starttask' => 'nullable|date_format:Y-m-d',
            'endtask' => 'nullable|date_format:Y-m-d|after_or_equal:starttask',
            'statustask' => 'nullable|string|max:60',
            'scoretask' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'idstorie.integer' => 'El ID de la historia debe ser un número entero.',
            'idstorie.exists' => 'La historia seleccionada no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'nametask.required' => 'El nombre de la tarea es obligatorio.',
            'nametask.string' => 'El nombre de la tarea debe ser una cadena de texto.',
            'nametask.max' => 'El nombre de la tarea no puede superar los 60 caracteres.',
            'starttask.date_format' => 'La fecha de inicio de la tarea debe tener el formato Año-Mes-Día.',
            'endtask.date_format' => 'La fecha de fin de la tarea debe tener el formato Año-Mes-Día.',
            'endtask.after_or_equal' => 'La fecha de fin de la tarea debe ser igual o posterior a la fecha de inicio.',
            'statustask.string' => 'El estado de la tarea debe ser una cadena de texto.',
            'statustask.max' => 'El estado de la tarea no puede superar los 60 caracteres.',
            'scoretask.integer' => 'La puntuación de la tarea debe ser un número entero.',
        ];
    }
}

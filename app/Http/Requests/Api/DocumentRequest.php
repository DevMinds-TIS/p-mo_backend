<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idproject' => 'nullable|integer|exists:projects,idproject',
            'idspace' => 'nullable|integer|exists:spaces,idspace',
            'idplanning' => 'nullable|integer|exists:plannings,idplanning',
            'idtracking' => 'nullable|integer|exists:trackings,idtracking',
            'idstorie' => 'nullable|integer|exists:stories,idstorie',
            'idtask' => 'nullable|integer|exists:tasks,idtask',
            'idteam' => 'nullable|integer|exists:teams,idteam',
            'namedocument' => 'required|string|max:90',
            'pathdocument' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'idproject.integer' => 'El ID del proyecto debe ser un número entero.',
            'idproject.exists' => 'El proyecto seleccionado no existe.',
            'idspace.integer' => 'El ID del espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'idplanning.integer' => 'El ID de la planificación debe ser un número entero.',
            'idplanning.exists' => 'La planificación seleccionada no existe.',
            'idtracking.integer' => 'El ID del seguimiento debe ser un número entero.',
            'idtracking.exists' => 'El seguimiento seleccionado no existe.',
            'idstorie.integer' => 'El ID de la historia debe ser un número entero.',
            'idstorie.exists' => 'La historia seleccionada no existe.',
            'idtask.integer' => 'El ID de la tarea debe ser un número entero.',
            'idtask.exists' => 'La tarea seleccionada no existe.',
            'namedocument.required' => 'El nombre del documento es obligatorio.',
            'namedocument.string' => 'El nombre del documento debe ser una cadena de texto.',
            'namedocument.max' => 'El nombre del documento no debe superar los 90 caracteres.',
            'pathdocument.required' => 'La ruta del documento es obligatoria.',
            'pathdocument.string' => 'La ruta del documento debe ser una cadena de texto.',
            'pathdocument.max' => 'La ruta del documento no debe superar los 255 caracteres.',
        ];
    }
}

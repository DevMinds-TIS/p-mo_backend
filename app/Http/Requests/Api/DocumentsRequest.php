<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idproject' => 'nullable|integer|exists:projects,idproject',
            'idspace' => 'nullable|integer|exists:spaces,idspace',
            'idplanning' => 'nullable|integer|exists:plannings,idplanning',
            'idtracking' => 'nullable|integer|exists:trackings,idtracking',
            'idstorie' => 'nullable|integer|exists:stories,idstorie',
            'idtask' => 'nullable|integer|exists:tasks,idtask',
            'pathdocument' => 'nullable|file|mimes:pdf,xlsx,docx,png,jpeg,jpg|max:10240',
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
            'pathdocument.file' => 'El documento debe ser un archivo.',
            'pathdocument.mimes' => 'El documento debe ser un archivo de tipo: pdf, xlsx, docx, png, jpeg, jpg.',
            'pathdocument.max' => 'El documento no debe superar los 10 MB.',
        ];
    }
}

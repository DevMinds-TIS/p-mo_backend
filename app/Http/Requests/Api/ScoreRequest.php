<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idtask' => 'nullable|integer|exists:tasks,idtask',
            'idce' => 'nullable|integer|exists:cross_evaluations,idce',
            'idsa' => 'nullable|integer|exists:self_assessments,idsa',
            'idpe' => 'nullable|integer|exists:peer_evaluations,idpe',
            'idteam' => 'nullable|integer|exists:teams,idteam',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idsprint' => 'nullable|integer|exists:sprints,idsprint',
            'idtracking' => 'nullable|integer|exists:trackings,idtracking',
            'idweeklie' => 'nullable|integer|exists:weeklies,idweeklie',
            'pointscore' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'idtask.integer' => 'El ID de la tarea debe ser un número entero.',
            'idtask.exists' => 'La tarea seleccionada no existe.',
            'idce.integer' => 'El ID de la evaluación cruzada debe ser un número entero.',
            'idce.exists' => 'La evaluación cruzada seleccionada no existe.',
            'idsa.integer' => 'El ID de la autoevaluación debe ser un número entero.',
            'idsa.exists' => 'La autoevaluación seleccionada no existe.',
            'idpe.integer' => 'El ID de la evaluación de pares debe ser un número entero.',
            'idpe.exists' => 'La evaluación de pares seleccionada no existe.',
            'idteam.integer' => 'El ID del equipo debe ser un número entero.',
            'idteam.exists' => 'El equipo seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idsprint.integer' => 'El ID del sprint debe ser un número entero.',
            'idsprint.exists' => 'El sprint seleccionado no existe.',
            'idtracking.integer' => 'El ID del seguimiento debe ser un número entero.',
            'idtracking.exists' => 'El seguimiento seleccionado no existe.',
            'idweeklie.integer' => 'El ID del weekly debe ser un número entero.',
            'idweeklie.exists' => 'El weekly seleccionado no existe.',
            'pointscore.integer' => 'La puntuación debe ser un número entero.',
            'pointscore.min' => 'La puntuación no puede ser negativa.',
        ];
    }
}

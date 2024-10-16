<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
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
            'idteam' => 'required|integer|exists:teams,idteam',
            'iduser' => 'required|integer|exists:users,iduser',
        ];
    }

    public function messages()
    {
        return [
            'idteam.required' => 'El ID del equipo es obligatorio.',
            'idteam.integer' => 'El ID del equipo debe ser un número entero.',
            'idteam.exists' => 'El equipo seleccionado no existe.',
            'iduser.required' => 'El ID del usuario es obligatorio.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
        ];
    }
}

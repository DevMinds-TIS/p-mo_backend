<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RoleUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idteammember' => 'nullable|integer|exists:team_members,idteammember',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idrol' => 'nullable|integer|exists:roles,idrol',
        ];
    }

    public function messages()
    {
        return [
            'idteammember.integer' => 'El ID del miembro del equipo debe ser un número entero.',
            'idteammember.exists' => 'El miembro del equipo seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idrol.integer' => 'El ID del rol debe ser un número entero.',
            'idrol.exists' => 'El rol seleccionado no existe.',
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'iduser' => 'nullable|integer|exists:users,iduser',
            'teacherpermission' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'teacherpermission.required' => 'El permiso del profesor es obligatorio.',
            'teacherpermission.string' => 'El permiso del profesor debe ser una cadena de texto.',
            'teacherpermission.max' => 'El permiso del profesor no debe superar los 10 caracteres.',
        ];
    }
}

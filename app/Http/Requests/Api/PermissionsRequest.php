<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
            "iduser" => "nullable|integer|exists:users,iduser",
            "teacherpermission" => "nullable|string|max:255|unique:permissions,teacherpermission"
        ];
    }

    public function messages()
    {
        return [
            "iduser.integer" => "El ID de usuario debe ser un número entero.",
            "iduser.exists" => "El usuario seleccionado no existe.",
            "teacherpermission.max" => "El permiso de maestro no puede superar los 255 caracteres.",
            "teacherpermission.unique" => "Este permiso de maestro ya está en uso.",
        ];
    }
}

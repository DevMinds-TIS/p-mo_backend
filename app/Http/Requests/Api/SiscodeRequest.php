<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SiscodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "idspace" => "nullable|integer|exists:spaces,idspace",
            "iduser" => "nullable|integer|exists:users,iduser",
            "siscode" => "nullable|string|max:60|unique:siscode,siscode"
        ];
    }

    public function messages()
    {
        return [
            'idspace.integer' => 'El ID de espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'iduser.integer' => 'El ID de usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'siscode.max' => 'El código SIS no puede superar los 60 caracteres.',
            'siscode.unique' => 'Este código SIS ya está en uso.',
        ];
    }
}

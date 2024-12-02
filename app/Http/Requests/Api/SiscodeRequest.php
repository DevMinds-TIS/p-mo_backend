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
            'idspace' => 'nullable|integer|exists:spaces,idspace',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'siscode' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'idspace.integer' => 'El ID del espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'siscode.required' => 'El código SISCO es obligatorio.',
            'siscode.string' => 'El código SISCO debe ser una cadena de texto.',
            'siscode.max' => 'El código SISCO no debe superar los 10 caracteres.',
        ];
    }
}

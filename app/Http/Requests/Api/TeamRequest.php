<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'nameteam' => 'nullable|string|max:60',
            'companyteam' => 'nullable|string|max:10',
            'emailteam' => 'nullable|string|email|max:120',
            'logoteam' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'idspace.integer' => 'El ID del espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'nameteam.required' => 'El nombre del equipo es obligatorio.',
            'nameteam.string' => 'El nombre del equipo debe ser una cadena de texto.',
            'nameteam.max' => 'El nombre del equipo no puede superar los 60 caracteres.',
            'companyteam.string' => 'La empresa del equipo debe ser una cadena de texto.',
            'companyteam.max' => 'La empresa del equipo no puede superar los 10 caracteres.',
            'emailteam.string' => 'El correo electrónico del equipo debe ser una cadena de texto.',
            'emailteam.email' => 'El correo electrónico del equipo debe ser una dirección válida.',
            'emailteam.max' => 'El correo electrónico del equipo no puede superar los 120 caracteres.',
            'logoteam.image' => 'El logo del equipo debe ser una imagen.',
            'logoteam.mimes' => 'El logo del equipo debe ser de tipo: jpeg, png, jpg, gif.',
            'logoteam.max' => 'El logo del equipo no debe superar los 2 MB.',
        ];
    }
}

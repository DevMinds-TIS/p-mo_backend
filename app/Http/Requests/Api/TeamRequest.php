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
            'repositoryteam' => 'nullable|string|max:255',
            'localdeployteam' => 'nullable|string|max:255',
            'externaldeployteam' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'idspace.integer' => 'El ID del espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'nameteam.required' => 'El nombre del equipo es obligatorio.',
            'nameteam.string' => 'El nombre del equipo debe ser una cadena de texto.',
            'nameteam.max' => 'El nombre del equipo no debe superar los 60 caracteres.',
            'companyteam.string' => 'La razón social debe ser una cadena de texto.',
            'companyteam.max' => 'La razón social no debe superar los 10 caracteres.',
            'emailteam.required' => 'El correo electrónico del equipo es obligatorio.',
            'emailteam.string' => 'El correo electrónico del equipo debe ser una cadena de texto.',
            'emailteam.email' => 'El correo electrónico del equipo debe ser una dirección de correo válida.',
            'emailteam.max' => 'El correo electrónico del equipo no debe superar los 120 caracteres.',
            'logoteam.string' => 'El logo del equipo debe ser una cadena de texto.',
            'logoteam.max' => 'El logo del equipo no debe superar los 255 caracteres.',
            'repositoryteam.string' => 'El repositorio del equipo debe ser una cadena de texto.',
            'repositoryteam.max' => 'El repositorio del equipo no debe superar los 255 caracteres.',
            'localdeployteam.string' => 'El despliegue local del equipo debe ser una cadena de texto.',
            'localdeployteam.max' => 'El despliegue local del equipo no debe superar los 255 caracteres.',
            'externaldeployteam.string' => 'El despliegue externo del equipo debe ser una cadena de texto.',
            'externaldeployteam.max' => 'El despliegue externo del equipo no debe superar los 255 caracteres.',
        ];
    }
}

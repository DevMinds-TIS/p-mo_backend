<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idweeklie' => 'nullable|integer|exists:weeklies,idweeklie',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idstatus' => 'nullable|integer|exists:statuses,idstatus',
            'codestorie' => 'nullable|string|max:10',
            'namestorie' => 'required|string|max:60',
            'pointstorie' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'idweeklie.integer' => 'El ID de la semana debe ser un número entero.',
            'idweeklie.exists' => 'La semana seleccionada no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'codestorie.string' => 'El código de la historia debe ser una cadena de texto.',
            'codestorie.max' => 'El código de la historia no debe superar los 10 caracteres.',
            'namestorie.required' => 'El nombre de la historia es obligatorio.',
            'namestorie.string' => 'El nombre de la historia debe ser una cadena de texto.',
            'namestorie.max' => 'El nombre de la historia no debe superar los 60 caracteres.',
            'pointstorie.integer' => 'Los puntos de la historia deben ser un número entero.',
            'pointstorie.min' => 'Los puntos de la historia no pueden ser negativos.',
        ];
    }
}

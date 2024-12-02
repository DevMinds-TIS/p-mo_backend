<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'iduser' => 'nullable|integer|exists:users,iduser',
            'idstatus' => 'nullable|integer|exists:statuses,idstatus',
            'messagenotification' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'messagenotification.required' => 'El mensaje de la notificación es obligatorio.',
            'messagenotification.string' => 'El mensaje de la notificación debe ser una cadena de texto.',
            'messagenotification.max' => 'El mensaje de la notificación no debe superar los 255 caracteres.',
        ];
    }
}

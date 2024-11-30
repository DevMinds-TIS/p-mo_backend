<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'namestatus' => 'required|string|max:90',
        ];
    }

    public function messages()
    {
        return [
            'namestatus.required' => 'El nombre del estado es obligatorio.',
            'namestatus.string' => 'El nombre del estado debe ser una cadena de texto.',
            'namestatus.max' => 'El nombre del estado no debe superar los 90 caracteres.',
        ];
    }
}

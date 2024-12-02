<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'namerol' => 'required|string|max:20|unique:roles,namerol',
            'iconrol' => 'nullable|string|max:80',
        ];
    }

    public function messages()
    {
        return [
            'namerol.required' => 'El nombre del rol es obligatorio.',
            'namerol.string' => 'El nombre del rol debe ser una cadena de texto.',
            'namerol.max' => 'El nombre del rol no debe superar los 20 caracteres.',
            'namerol.unique' => 'El nombre del rol ya está en uso.',
            'iconrol.string' => 'El ícono del rol debe ser una cadena de texto.',
            'iconrol.max' => 'El ícono del rol no debe superar los 80 caracteres.',
        ];
    }
}

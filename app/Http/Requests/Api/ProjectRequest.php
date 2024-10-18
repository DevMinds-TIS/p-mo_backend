<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            "nameproject" => "required|string|max:120",
            "codeproject" => "nullable|string|max:30|unique:projects,codeproject",
            "startproject' => 'nullable|date",
            "endproject' => 'nullable|date|after_or_equal:startproject",
        ];
    }

    public function messages()
    {
        return [
            "iduser.integer" => "El ID de usuario debe ser un número entero.",
            "iduser.exists" => "El usuario seleccionado no existe.",
            "nameproject.required" => "El nombre del proyecto es obligatorio.",
            "nameproject.max" => "El nombre del proyecto no puede superar los 120 caracteres.",
            "codeproject.max" => "El código del proyecto no puede superar los 30 caracteres.",
            "codeproject.unique" => "Este código de proyecto ya está en uso.",
            "startproject.date" => "La fecha de inicio del proyecto debe ser una fecha válida.",
            "endproject.date" => "La fecha de fin del proyecto debe ser una fecha válida.",
            "endproject.after_or_equal" => "La fecha de fin del proyecto debe ser igual o posterior a la fecha de inicio.",
        ];
    }
}

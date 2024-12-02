<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'namecategory' => 'required|string|max:20|unique:category,namecategory',
        ];
    }

    public function messages()
    {
        return [
            'namecategory.required' => 'El nombre de la categoría es obligatorio.',
            'namecategory.string' => 'El nombre de la categoría debe ser una cadena de texto.',
            'namecategory.max' => 'El nombre de la categoría no debe superar los 20 caracteres.',
            'namecategory.unique' => 'El nombre de la categoría ya está en uso.',
        ];
    }
}

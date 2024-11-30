<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idproject' => 'required|integer|exists:projects,id',
            'idspace' => 'required|integer|exists:spaces,id',
            'idstatus' => 'required|integer|exists:statuses,id',
            'titleann' => 'required|string|max:90',
            'contentann' => 'required|stringmax:255',
        ];
    }

    public function messages()
    {
        return [
            'idproject.required' => 'El ID del proyecto es obligatorio.',
            'idproject.integer' => 'El ID del proyecto debe ser un número entero.',
            'idproject.exists' => 'El proyecto seleccionado no existe.',
            'idspace.required' => 'El ID del espacio es obligatorio.',
            'idspace.integer' => 'El ID del espacio debe ser un número entero.',
            'idspace.exists' => 'El espacio seleccionado no existe.',
            'idstatus.required' => 'El ID del estado es obligatorio.',
            'idstatus.integer' => 'El ID del estado debe ser un número entero.',
            'idstatus.exists' => 'El estado seleccionado no existe.',
            'titleann.required' => 'El título del anuncio es obligatorio.',
            'titleann.string' => 'El título del anuncio debe ser una cadena de texto.',
            'titleann.max' => 'El título del anuncio no debe superar los 90 caracteres.',
            'contentann.required' => 'El contenido del anuncio es obligatorio.',
            'contentann.string' => 'El contenido del anuncio debe ser una cadena de texto.',
            'contentann.max' => 'El contenido del anuncio no debe superar los 255 caracteres.',
        ];
    }
}

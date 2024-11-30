<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idann' => 'required|integer|exists:announcements,idann',
            'contentcomment' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'idann.required' => 'El ID del anuncio es obligatorio.',
            'idann.integer' => 'El ID del anuncio debe ser un número entero.',
            'idann.exists' => 'El anuncio seleccionado no existe.',
            'contentcomment.required' => 'El contenido del comentario es obligatorio.',
            'contentcomment.string' => 'El contenido del comentario debe ser una cadena de texto.',
            'contentcomment.max' => 'El contenido del comentario no debe superar los 255 caracteres.',
        ];
    }
}

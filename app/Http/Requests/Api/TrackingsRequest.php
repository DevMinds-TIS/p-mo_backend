<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TrackingsRequest extends FormRequest
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
            'idsprint' => 'nullable|integer|exists:sprints,idsprint',
            'iduser' => 'nullable|integer|exists:users,iduser',
            'nametracking' => 'required|string|max:90',
            'deliverytracking' => 'nullable|date_format:Y-m-d',
            'returntracking' => 'nullable|date_format:Y-m-d|after_or_equal:deliverytracking',
            'statustracking' => 'nullable|string|max:90',
            'commenttracking' => 'nullable|string|max:180',
        ];
    }

    public function messages()
    {
        return [
            'idsprint.integer' => 'El ID del sprint debe ser un número entero.',
            'idsprint.exists' => 'El sprint seleccionado no existe.',
            'iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'iduser.exists' => 'El usuario seleccionado no existe.',
            'nametracking.required' => 'El nombre del tracking es obligatorio.',
            'nametracking.string' => 'El nombre del tracking debe ser una cadena de texto.',
            'nametracking.max' => 'El nombre del tracking no puede superar los 90 caracteres.',
            'deliverytracking.date_format' => 'La fecha de entrega del tracking debe tener el formato Año-Mes-Día.',
            'returntracking.date_format' => 'La fecha de devolución del tracking debe tener el formato Año-Mes-Día.',
            'returntracking.after_or_equal' => 'La fecha de devolución del tracking debe ser igual o posterior a la fecha de entrega.',
            'statustracking.string' => 'El estado del tracking debe ser una cadena de texto.',
            'statustracking.max' => 'El estado del tracking no puede superar los 90 caracteres.',
            'commenttracking.string' => 'El comentario del tracking debe ser una cadena de texto.',
            'commenttracking.max' => 'El comentario del tracking no puede superar los 180 caracteres.',
        ];
    
    }
}

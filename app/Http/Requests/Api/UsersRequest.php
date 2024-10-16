<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'nameuser' => 'required|string|max:60',
            'lastnameuser' => 'required|string|max:60',
            'emailuser' => 'required|string|email|max:120|unique:users,emailuser,' . $this->iduser,
            'passworduser' => 'required|string|min:8',
            'profileuser' => 'nullable|image|max:2048',
        ];

        if ($this->input('role') === 'estudiante') {
            $rules['use_iduser'] = 'required|exists:users,iduser'; // Docente existente
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nameuser.required' => 'El nombre es obligatorio.',
            'lastnameuser.required' => 'El apellido es obligatorio.',
            'emailuser.required' => 'El correo electrónico es obligatorio.',
            'emailuser.email' => 'El correo electrónico debe ser una dirección válida.',
            'emailuser.unique' => 'El correo electrónico ya está registrado.',
            'passworduser.required' => 'La contraseña es obligatoria.',
            'passworduser.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'profileuser.image' => 'El perfil debe ser una imagen.',
            'profileuser.max' => 'La imagen de perfil no debe superar los 2048 KB.',
            'use_iduser.required' => 'Debe asignarse un docente a un estudiante.',
            'use_iduser.exists' => 'El docente asignado no existe.',
        ];
    }
}

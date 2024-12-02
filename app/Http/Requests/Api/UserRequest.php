<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idsiscode' => 'nullable|integer|exists:siscode,idsiscode',
            'idpermission' => 'nullable|integer|exists:permissions,idpermission',
            'use_iduser' => 'nullable|integer|exists:users,iduser',
            'nameuser' => 'nullable|string|max:60',
            'lastnameuser' => 'nullable|string|max:60',
            'emailuser' => 'nullable|string|email|max:120|unique:users,emailuser',
            'passworduser' => 'nullable|string|min:8|max:255',
            'profileuser' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico,webp|max:2048',
            'idrol' => 'nullable|integer|exists:roles,idrol',
            'teacherpermission' => 'nullable|string|exists:permissions,teacherpermission',
            'siscode' => 'nullable|string|exists:siscode,siscode',
        ];
    }

    public function messages()
    {
        return [
            'idsiscode.integer' => 'El ID del siscode debe ser un número entero.',
            'idsiscode.exists' => 'El siscode seleccionado no existe.',
            'idpermission.integer' => 'El ID del permiso debe ser un número entero.',
            'idpermission.exists' => 'El permiso seleccionado no existe.',
            'use_iduser.integer' => 'El ID del usuario debe ser un número entero.',
            'use_iduser.exists' => 'El usuario seleccionado no existe.',
            'nameuser.required' => 'El nombre del usuario es obligatorio.',
            'nameuser.string' => 'El nombre del usuario debe ser una cadena de texto.',
            'nameuser.max' => 'El nombre del usuario no debe superar los 60 caracteres.',
            'lastnameuser.required' => 'El apellido del usuario es obligatorio.',
            'lastnameuser.string' => 'El apellido del usuario debe ser una cadena de texto.',
            'lastnameuser.max' => 'El apellido del usuario no debe superar los 60 caracteres.',
            'emailuser.required' => 'El correo electrónico del usuario es obligatorio.',
            'emailuser.string' => 'El correo electrónico del usuario debe ser una cadena de texto.',
            'emailuser.email' => 'El correo electrónico del usuario debe ser una dirección de correo válida.',
            'emailuser.max' => 'El correo electrónico del usuario no debe superar los 120 caracteres.',
            'emailuser.unique' => 'El correo electrónico del usuario ya está en uso.',
            'passworduser.required' => 'La contraseña del usuario es obligatoria.',
            'passworduser.string' => 'La contraseña del usuario debe ser una cadena de texto.',
            'passworduser.min' => 'La contraseña del usuario debe tener al menos 8 caracteres.',
            'passworduser.max' => 'La contraseña del usuario no debe superar los 255 caracteres.',
            'profileuser.string' => 'El perfil del usuario debe ser una cadena de texto.',
            'profileuser.max' => 'El perfil del usuario no debe superar los 255 caracteres.',
            'idrol.required' => 'El rol es obligatorio.',
            'idrol.integer' => 'El ID del rol debe ser un número entero.',
            'idrol.exists' => 'El rol seleccionado no existe.',
            'teacherpermission.required' => 'El permiso del profesor es obligatorio.',
            'teacherpermission.string' => 'El permiso del profesor debe ser una cadena de texto.',
            'teacherpermission.exists' => 'El permiso del profesor seleccionado no existe.',
            'siscode.required' => 'El código SISCO es obligatorio.',
            'siscode.string' => 'El código SISCO debe ser una cadena de texto.',
            'siscode.exists' => 'El código SISCO seleccionado no existe.',
        ];
    }
}

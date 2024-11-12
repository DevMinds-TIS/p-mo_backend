<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nameuser' => 'required|string|max:60',
            'lastnameuser' => 'required|string|max:60',
            'emailuser' => 'required|string|email|max:120|unique:users,emailuser',
            'passworduser' => 'required|string|min:8',
            'idrol' => 'required|integer|exists:roles,idrol',
            'teacherpermission' => 'required|string|exists:permissions,teacherpermission',
        ];
    }
}

<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Api\UserRequest;

class RegisterStudentRequest extends UserRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'nameuser' => 'required|string|max:60',
            'lastnameuser' => 'required|string|max:60',
            'emailuser' => 'required|string|email|max:120|unique:users,emailuser',
            'passworduser' => 'required|string|min:8',
            'idrol' => 'required|integer|exists:roles,idrol',
            'siscode' => 'required|string|exists:siscode,siscode',
            'use_iduser' => 'required|integer|exists:users,iduser',
        ]);
    }
}

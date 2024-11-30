<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Api\UserRequest;

class LoginUserRequest extends UserRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            "emailuser" => "required|string|email|max:120",
            "passworduser" => "required|string|min:8"
        ]);
    }
}

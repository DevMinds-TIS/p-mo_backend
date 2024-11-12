<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "emailuser" => "required|string|email|max:120",
            "passworduser" => "required|string|min:8"
        ];
    }
}

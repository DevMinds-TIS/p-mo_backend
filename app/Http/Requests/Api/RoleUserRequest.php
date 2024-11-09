<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RoleUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idteammember' => 'required|integer|exists:teams,idteam',
            'iduser' => 'required|integer|exists:users,iduser',
            'idrol' => 'required|integer|exists:roles,idrol'
        ];
    }
}

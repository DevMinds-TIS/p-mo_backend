<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RoleUserRequest extends FormRequest
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
            'idteammember' => 'required|integer|exists:teams,idteam',
            'iduser' => 'required|integer|exists:users,iduser',
            'idrol' => 'required|integer|exists:roles,idrol'
        ];
    }
}

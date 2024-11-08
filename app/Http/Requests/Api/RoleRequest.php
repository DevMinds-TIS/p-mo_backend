<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "namerol" => "required|string|max:20|unique:roles,namerol",
            "iconrol" => "required|string|max:80"
        ];
    }
}

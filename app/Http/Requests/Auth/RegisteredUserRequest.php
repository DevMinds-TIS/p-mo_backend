<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredUserRequest extends FormRequest
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
        $rules = [
            "nameuser" => "required|string|max:60",
            "lastnameuser" => "required|string|max:60",
            "emailuser" => "required|string|email|max:120|unique:users,emailuser",
            "passworduser" => "required|string|min:8",
            "idrol" => "required|integer|exists:roles,idrol",
        ];
    
        if ($this->idrol == 2) {
            // Reglas adicionales para el rol Teacher
            $rules["teacherpermission"] = "required|string|exists:permissions,teacherpermission";
        } elseif ($this->idrol == 3) {
            // Reglas adicionales para el rol Student
            $rules["siscode"] = "required|string|exists:siscode,siscode";
            $rules["use_iduser"] = "required|integer|exists:users,iduser,idrol,2";
        }
    
        return $rules;
    }
}

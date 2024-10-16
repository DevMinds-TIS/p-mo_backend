<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

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

        if ($this->input("idrol") == 2) {
            // Reglas adicionales para el rol Teacher
            $rules["teacherpermission"] = "required|string|exists:permissions,teacherpermission";
        } elseif ($this->input("idrol") == 3) {
            // Reglas adicionales para el rol Student
            $rules["siscode"] = "required|string|exists:siscode,siscode";
            // Validación personalizada para verificar si use_iduser existe en la tabla role_user con idrol 2
            $rules["use_iduser"] = [
                "required",
                "integer",
                function ($attribute, $value, $fail) {
                    $roleUser = DB::table("role_user")
                        ->where("iduser", $value)
                        ->where("idrol", 2)
                        ->first();

                    if (!$roleUser) {
                        $fail("El docente asignado no existe o no tiene el rol de docente.");
                    }
                },
            ];
        }

        return $rules;
    }
}

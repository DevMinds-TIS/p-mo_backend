<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class RegisteredStudentRequest extends FormRequest
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
            'nameuser' => 'required|string|max:60',
            'lastnameuser' => 'required|string|max:60',
            'emailuser' => 'required|string|email|max:120|unique:users,emailuser',
            'passworduser' => 'required|string|min:8',
            'idrol' => 'required|integer|exists:roles,idrol',
            'siscode' => 'required|string|exists:siscode,siscode',
            // 'use_iduser' => [
            //     'required',
            //     'integer',
            //     function ($attribute, $value, $fail) {
            //         $roleUser = DB::table("role_user")->where("iduser", $value)->where("idrol", 2)->first();
            //         if (!$roleUser) {
            //             $fail("El docente asignado no existe o no tiene el rol de docente.");
            //         }
            //     },
            // ],
        ];
    }
}

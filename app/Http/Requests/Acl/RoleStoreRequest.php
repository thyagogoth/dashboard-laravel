<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $this->role = "ROLE_".$this->role;
        return [
            "name" => ['required', 'string', 'unique:roles,name'],
            "role" => [
                'required',
                'string',
                "unique:roles,role",
                "regex:(ROLE_[A-Z]*)"
            ]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => 'O Nome da role é obrigatório',
            "name.unique" => 'O Nome da role já está em uso',
            "role.required" => 'O Nome da role é obrigatório',
            'role.string'   => 'O Nome da role deve ser uma string',
            'role.unique'   => 'O Nome da role já está em uso',
        ];
    }
}

<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $role_id = $this->id;
        return [
            'name' => 'required|string|max:255|unique:roles,name,'.$role_id,
            'role' => 'required|string|max:255|unique:roles,role,'.$role_id,
        ];
    }

    public function messages()
    {
        return [
            "name.required" => 'O Nome da role é obrigatório',
            "name.unique"   => 'O Nome da role já está em uso',
            "role.required" => 'O Nome da role é obrigatório',
            'role.string'   => 'O Nome da role deve ser uma string',
            'role.unique'   => 'O Nome da role já está em uso',
        ];
    }
}

<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class ModuleUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $module_id = $this->id;
        return [
            'name' => 'required|string|max:255|unique:modules,name,'.$module_id,
        ];
    }

    public function messages()
    {
        return [
            "name.required" => 'O Nome da module é obrigatório',
            "name.unique"   => 'O Nome da module já está em uso',
        ];
    }
}

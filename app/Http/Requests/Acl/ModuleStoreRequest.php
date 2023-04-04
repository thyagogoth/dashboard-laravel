<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class ModuleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ['required', 'string', 'unique:modules,name'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => 'O Nome do module é obrigatório',
            "name.unique" => 'O Nome do module já está em uso',
        ];
    }
}

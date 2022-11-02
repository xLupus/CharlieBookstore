<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'  => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns'],
            'senha' => ['required', 'string'],
            'cpf'   => ['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo',
            'email.required' => 'Preencha o campo',
            'email.email' => 'Insira um formato de e-mail valido',
            'senha.required' => 'Preencha o campo',
            'cpf.required' => 'Preencha o campo',
        ];
    }
}

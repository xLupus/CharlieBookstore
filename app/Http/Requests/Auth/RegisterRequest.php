<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => ['required', 'email:rfc,dns', 'unique:App\Models\User,USUARIO_EMAIL'],
            'senha' => ['required', 'string'],
            'cpf'   => ['required', 'numeric', 'min_digits:11', 'max_digits:11', 'unique:App\Models\User,USUARIO_CPF']
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
            'nome.required'  => 'Preencha o campo',
            'nome.string'    => 'Esse campo deve conter apenas texto',
            'email.required' => 'Preencha o campo',
            'email.email'    => 'Insira um formato de e-mail valido',
            'email.unique'   => 'E-mail já cadastrado',
            'senha.required' => 'Preencha o campo',
            'cpf.required'   => 'Preencha o campo',
            'cpf.numeric'    => 'Esse campo deve conter apenas numeros',
            'cpf.min_digits' => 'Esse campo deve ter 11 digitos',
            'cpf.max_digits' => 'Esse campo deve ter 11 digitos',
            'cpf.unique'     => 'CPF informado já cadastrado'
        ];
    }
}

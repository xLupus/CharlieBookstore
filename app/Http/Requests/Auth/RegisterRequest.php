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
            'senha' => ['required', 'string', 'min_digits:8'],
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
            'nome.required'     => 'Preencha este campo',
            'nome.string'       => 'Esse campo deve conter apenas texto',
            'email.required'    => 'Preencha este campo',
            'email.email'       => 'Insira um formato de e-mail válido',
            'email.unique'      => 'O e-mail informado já possui cadastro',
            'senha.required'    => 'Preencha este campo',
            'senha.min_digits'  => 'Esse campo deve ter 8 digitos',
            'cpf.required'      => 'Preencha este campo',
            'cpf.numeric'       => 'Esse campo deve conter apenas numeros',
            'cpf.min_digits'    => 'Esse campo deve ter 11 digitos',
            'cpf.max_digits'    => 'Esse campo deve ter 11 dígitos',
            'cpf.unique'        => 'O CPF informado já possui cadastro'
        ];
    }
}

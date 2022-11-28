<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'cep'         => ['required', 'min_digits:8', 'max_digits:8'],
            'numero'      => ['required', 'numeric'],
            'complemento' => ['nullable', 'string'],
            'logradouro'  => ['required', 'string'],
            'cidade'      => ['required', 'string'],
            'uf'          => ['required', 'min:2', 'max:2', 'string'],
            'rotulo'      => ['required', 'string'],
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
            'cep.required'        => 'O campo CEP é obrigatório',
            'cep.min_digits'      => 'O campo CEP deve conter 8 dígitos',
            'cep.max_digits'      => 'O campo CEP deve apenas 8 dígitos',
            'numero.required'     => 'O campo Número é obrigatório',
            'complemento'         => '',
            'logradouro.required' => 'O campo Endereço é obrigatório',
            'cidade.required'     => 'O campo Cidade é obrigatório',
            'uf.required'         => 'O campo UF é obrigatório',
            'rotulo.required'     => 'O campo Rótulo é obrigatório',
        ];
    }
}

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
            'cep'         => ['required', 'min:8', 'max:8'],
            'numero'      => ['required', 'numeric'],
            'complemento' => ['nullable', 'string'],
            'logradouro'  => ['required', 'string'],
            'cidade'      => ['required', 'string'],
            'uf'          => ['required','min:2', 'max:2', 'string'],
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
            'cep.required'        => 'O campo CEP é obrigatorio',
            'numero.required'     => 'O campo Numero é obrigatorio',
            'complemento'         => '',
            'logradouro.required' => 'O campo Endereco é obrigatorio',
            'cidade.required'     => 'O campo Cidade é obrigatorio',
            'uf.required'         => 'O campo UF é obrigatorio',
            'rotulo.required'     => 'O campo Rotulo é obrigatorio',
        ];
    }
}

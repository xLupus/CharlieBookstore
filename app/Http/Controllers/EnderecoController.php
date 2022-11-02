<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'cep'         => 'required|min:8|max:8',
            'numero'      => 'required|integer',
            'complemento' => 'nullable',
            'logradouro'  => 'required|string',
            'bairro'      => 'required|string',
            'cidade'      => 'required|string',
            'uf'          => 'required|min:2|max:2|string',
            'rotulo'      => 'required|string'
        ]);

        $verification = Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)
                                        ->where('ENDERECO_NOME', $request->rotulo)
                                        ->get();

        if ($verification->count() != 0) {            
            session()->flash('error-message', 'Endereço com Rotulo já cadastrado');

            return redirect()->back();
        }

        Endereco::create([
            'USUARIO_ID'           => Auth::user()->USUARIO_ID,
            'ENDERECO_CEP'         => $request->cep,
            'ENDERECO_NUMERO'      => $request->numero,
            'ENDERECO_COMPLEMENTO' => $request->complemento,
            'ENDERECO_LOGRADOURO'  => $request->logradouro,
            'ENDERECO_CIDADE'      => $request->cidade,
            'ENDERECO_ESTADO'      => $request->uf,
            'ENDERECO_NOME'        => $request->rotulo
        ]);

        session()->flash('success-message', 'Endereco salvo com sucesso');

        return redirect()->back();
    }

}

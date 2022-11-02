<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itensCarrinho = Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)
                                        ->where('ITEM_QTD', '>', 0)
                                        ->get();

        if (!count($itensCarrinho)) return redirect(route('home'));

        $enderecos = Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID )
                                    ->paginate(3);

        //dd($enderecos->links());

        return view('carrinho.index')->with([
            'itens'     => $itensCarrinho,
            'enderecos' => $enderecos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cart = Carrinho::where([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $id,
        ])->first(); //pega uma

        if ($cart) {
            $estoque = Produto::where('PRODUTO_ID', $id)->first()->produtoEstoque->PRODUTO_QTD;

            if ($request->qtd > 0) //se o estoque for maior que a soma
                $cart->update(['ITEM_QTD'=> $request->qtd > $estoque ? $estoque : $request->qtd]);

            else
                $cart->update(['ITEM_QTD'=> 0]);

        } else {
            $cart = Carrinho::create([
                'USUARIO_ID' => Auth::user()->USUARIO_ID,
                'PRODUTO_ID' => $id,
                'ITEM_QTD'   => $request->qtd
            ]);
        }

        session()->flash('message', 'Adicionado com sucesso'); //zika d+

        return redirect()->back();
    }
}

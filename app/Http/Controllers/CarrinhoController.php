<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Produto;
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

        return view('carrinho.index')->with('itens', Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //    dd($request, $id);
        //dd(Auth::user()->USUARIO_ID);
        $cart = Carrinho::where([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $id,
        ])->first(); //pega uma

        if ($cart) {
            $soma    = $request->qtd;

            $estoque = Produto::where('PRODUTO_ID', $id)->first()->produtoEstoque->PRODUTO_QTD;

            if ($soma > 0) {
                $cart->update([
                    'ITEM_QTD'=> $soma > $estoque ? $estoque : $soma //se o estoque for maior que a soma
                ]);
            } else{
                $cart->update([
                    'ITEM_QTD'=> 0
                ]);
            }

        } else {
            $cart = Carrinho::create([
                'USUARIO_ID' => Auth::user()->USUARIO_ID,
                'PRODUTO_ID' => $id,
                'ITEM_QTD'   => $request->qtd
            ]);
        }

        session()->flash('message', 'Adicionar com sucesso'); //zika d+

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

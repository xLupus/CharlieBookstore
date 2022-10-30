<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pedidos = Pedido::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get()->all();

        return view('user.pedidos', compact('pedidos'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pedidos = PedidoItem::where('PEDIDO_ID', $request->id)->get();

        
        //dd($pedidos, $pedidos[1]->pedidoItens);
        return view('user.pedido', compact('pedidos'));
    }

    public function pagamento()
    {
        return view('carrinho.pagamento');
    }

}

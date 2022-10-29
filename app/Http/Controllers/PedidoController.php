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
        /*
        $pedidos     = Pedido::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get()->all();

        $itens       = PedidoItem::where('PEDIDO_ID', $pedidos[0]->PEDIDO_ID)->get();

        $status      = PedidoStatus::where('STATUS_ID', $pedidos[0]->STATUS_ID)->get();

        $totalCompra = $itens[0]->ITEM_QTD * $itens[0]->ITEM_PRECO;

        dd($pedidos[0]->PEDIDO_ID, $pedidos[0]->PEDIDO_DATA,  $status[0]->STATUS_DESC, $totalCompra);
        */
        return view('user.pedidos');
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
    public function show(Pedido $pedido)
    {
        return view('user.pedido');
    }

    public function pagamento()
    {
        return view('carrinho.pagamento');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;
use App\Models\Endereco;
use App\Models\Carrinho;
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
        $usuario  = Auth::user();

        $endereco = Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)
                                    ->get()
                                    ->last();

        $produtos = Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)
                                    ->where('ITEM_QTD', '>', 0)
                                    ->get()
                                    ->all();

        return view('carrinho.checkout', compact('usuario', 'endereco', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario      = Auth::user()->USUARIO_ID;
        $dataCompra   = new \DateTime('', new \DateTimeZone('America/Sao_Paulo'));
        $pedidoStatus = 1; //Pendente

        $produtos = Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)
                                    ->where('ITEM_QTD', '>', 0)
                                    ->get()
                                    ->all();

        dd($dataCompra->format('Y-m-d'), $usuario, $produtos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //PRECISA FILTRA OS PEDIDOS APENAS DO USUARIO
        $items = PedidoItem::where('PEDIDO_ID', $request->id)->get();

        return view('user.pedido', compact('items'));
    }
}

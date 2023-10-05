@extends('layout')

@section('title', 'Meus Pedidos')
@section('script', '/js/pedidos.js')
@section('style', '/css/pedidos.css')

@section('main')
    <main role="main">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="link">Perfil</a></li>
                            <li class="breadcrumb-item active">Meus Pedidos</li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 mt-2">
                    <span class="d-block fs-3 fw-bold">Meus Pedidos</span>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-11 mx-auto">
                    <div class="table-responsive shadow-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr class="align-middle history-header">
                                    <th scope="col">ID</th>
                                    <th scope="col">DATA DA COMPRA</th>
                                    <th scope="col">MÉTODO DE PAGAMENTO</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">Nº DE ITENS</th>
                                    <th scope="col">TOTAL DA COMPRA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pedidos->count() != 0)
                                    @foreach ($pedidos as $pedido)
                                        @php
                                            $precoTotal = [];
                                            $itensTotal = 0;

                                            foreach ($pedido->pedidoItens as $item) {
                                                $precoTotal[] = $item->ITEM_QTD * ($item->ITEM_PRECO);
                                                $itensTotal += $item->ITEM_QTD;
                                            }
                                        @endphp
                                        <tr>
                                            <th scope="row"><a href="{{route('pedido', $pedido->PEDIDO_ID)}}" class="link text-dark">#{{$pedido->PEDIDO_ID}}</a></th>
                                            <td>{{implode('/', array_reverse(explode('-', $pedido->PEDIDO_DATA)))}}</td>
                                            <td class="pagamento"></td>
                                            <td><span class="badge rounded-pill text-dark px-2 status">{{$pedido->pedidoStatus->STATUS_DESC}}</span></td>
                                            <td>{{$itensTotal}}</td>
                                            <td>R$ {{number_format(array_sum($precoTotal), 2)}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Você não possui nenhum pedido</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    {{ $pedidos->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection

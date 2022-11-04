@extends('layout')

@section('title', 'Meus Pedidos')
@section('script', '/js/pedidos.js')
@section('style', '/css/pedidos.css')

@section('main')
    <div class="container-xxl mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link">Perfil</a></li>
                <li class="breadcrumb-item active">Meus Pedidos</li>
            </ol>
        </nav>
    </div>

    <main class="container-xxl">
        <h1 class="h4 fw-bold">Meus Pedidos</h1>

        <div class="d-flex flex-column align-items-center mt-4 mb-5">
            <table class="table table-striped mb-5">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">DATA DA COMPRA</th>
                        <th scope="col" class="text-center">METODO DE PAGAMENTO</th>
                        <th scope="col" class="text-center">STATUS</th>
                        <th scope="col" class="text-center">N DE ITENS</th>
                        <th scope="col" class="text-center">TOTAL DA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pedidos->count() != 0)
                        @foreach ($pedidos as $pedido)
                            @php
                                $precoTotal = [];

                                foreach ($pedido->pedidoItens as $item) {
                                    $precoTotal[] = $item->ITEM_QTD * ($item->ITEM_PRECO);
                                }
                            @endphp
                            <tr>
                                <td class="text-center py-3"><a href="{{route('pedido', $pedido->PEDIDO_ID)}}" class="link text-dark">#{{$pedido->PEDIDO_ID}}</a></td>
                                <td class="text-center py-3">{{implode('/', array_reverse(explode('-', $pedido->PEDIDO_DATA)) )}}</td>
                                <td class="text-center py-3 pagamento"></td>
                                <td class="text-center py-3 status">
                                    <span class="badge rounded-pill">{{$pedido->pedidoStatus->STATUS_DESC}}</span>
                                </td>
                                <td class="text-center py-3">{{$pedido->pedidoItens->count()}}</td>
                                <td class="text-center py-3">R$ {{number_format(array_sum($precoTotal), 2)}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-3">Você não possui nenhum pedido</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{ $pedidos->links() }}
        </div>
    </main>
@endsection

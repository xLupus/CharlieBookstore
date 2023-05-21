@extends('layout')

@section('style', '/css/pedido.css')
@section('title', "Pedido #{$items[0]->PEDIDO_ID}")

@section('main')
    <main role="main">
        <div class="container-xxl">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="link">Perfil</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pedidos')}}" class="link">Meus Pedidos</a></li>
                    <li class="breadcrumb-item active">Pedido #{{$items[0]->PEDIDO_ID}}</li>
                </ul>
            </nav>
        </div>

        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col-11 col-lg-8 mx-auto">
                    <span class="d-block fw-bold h4 mt-5 mt-lg-0">Pedido #{{$items[0]->PEDIDO_ID}}</span>

                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @foreach ($items as $item)
                        <hr class="hr bg-light">

                        <div class="row row-cols-1 row-cols-sm-2 py-2">
                            <div class="col-11 col-sm-4 col-lg-3 mx-auto d-flex justify-content-center">
                                <div class="overflow-hidden rounded-4 div">
                                    <img src="{{$item->pedidoItens->produtoImagens[0]->IMAGEM_URL}}" width="140" class="img-fluid">
                                </div>
                            </div>

                            <div class="col-11 col-sm-6 col-lg-9 mx-auto text-center text-sm-start mt-3 mt-sm-0 lh-lg info">
                                <div>
                                    <span class="fw-bold">Titulo: </span>
                                    <span>{{$item->pedidoItens->PRODUTO_NOME}}</span>
                                </div>

                                <div>
                                    <span class="fw-bold">Categoria: </span>
                                    <span>{{$item->pedidoItens->produtoCategoria->CATEGORIA_NOME}}</span>
                                </div>

                                <div>
                                    <span class="fw-bold">Quantidade: </span>
                                    <span>{{$item->ITEM_QTD}} unidade(s)</span>
                                </div>

                                <div>
                                    <span class="fw-bold">Preço Unitario: </span>
                                    <span>R$ {{number_format($item->ITEM_PRECO, 2)}}</span>
                                </div>

                                <div>
                                    <span class="fw-bold">Valor Total do Item: </span>
                                    <span>R$ {{number_format($item->ITEM_PRECO * $item->ITEM_QTD, 2)}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-11 col-lg-4 mx-auto order-first order-lg-0">
                    <div class="d-block bg-light shadow-sm p-4">
                        <span class="d-block fw-bold">ENDEREÇO DE ENTREGA</span>
                        <span class="d-block fs-5 mt-3">{{$endereco->ENDERECO_LOGRADOURO}}, {{$endereco->ENDERECO_NUMERO}} - {{$endereco->ENDERECO_COMPLEMENTO}}{{$endereco->ENDERECO_CIDADE}} - {{$endereco->ENDERECO_ESTADO}}, {{$endereco->ENDERECO_CEP}}</span>

                        <hr class="hr bg-dark my-4">

                        <div class="row row-cols-3 lh-lg">
                            <div class="col-12">
                                <span class="d-block fw-bold">PREÇO DO PEDIDO</span>
                            </div>
                            <div class="col-6">
                                <span class="d-block">TOTAL PAGO</span>
                                <span class="d-block">FRETE</span>
                            </div>
                            <div class="col-6 d-flex flex-column align-items-end fw-bold">
                                <span class="d-block">R$ {{$precoTotal}}</span>
                                <span class="d-block">Grátis</span>
                            </div>
                        </div>

                        <hr class="hr bg-dark my-4">

                        <div class="row row-cols-2 fw-bold">
                            <div class="col-6">
                                <span class="d-block">VALOR TOTAL</span>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <span class="d-block">R$ {{$precoTotal}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

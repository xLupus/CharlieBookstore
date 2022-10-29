@extends('layout')

@section('title', 'Carrinho')
@section('script', '/js/carrinho.js')
@section('style', '/css/carrinho.css')

@php
    $precoTotal    = 0;
    $descontoTotal = 0;

    foreach ($itens as $item) {
        $precoTotal    = $precoTotal + $item->produto->PRODUTO_PRECO * $item->ITEM_QTD;
        $descontoTotal = $descontoTotal + $item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD;
    }
@endphp

@section('main')
    <main role="main">
        <div class="container-xxl mt-5 mb-5">
            <div class="row row-cols-2">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="link text-decoration-none text-dark">Carrinho</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 mt-2 mb-2">
                    <span class="d-block fs-3 fw-bold">CARRINHO</span>
                </div>
            </div>

            <div class="row row-cols-2 gx-5">
                <div class="col-8">
                    <hr class="hr bg-light">
                    <span class="d-block h2 mb-4">Informações de entrega</span>

                    @if (session()->has('endereco_message'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session()->get('endereco_message') }}
                        </div>
                    @endif

                    @if (count($errors->all()) > 0))
                        <ul class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                <li class="ms-3">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (count($enderecos) >= 1)
                        {{$hideForm = 'd-none'}}
                        @foreach ($enderecos as $endereco)
                            <div class="bg-light w-75 d-flex p-3 rounded mb-3">
                                <input type="radio" id="{{$endereco->ENDERECO_NOME}}" class="ms-3 me-4" name="endereco" value="{{$endereco->ENDERECO_ID}}">
                                <label for="{{$endereco->ENDERECO_NOME}}" class="ms-1">
                                    <span class="d-block mb-2"><strong>{{strtoupper($endereco->ENDERECO_NOME)}}</strong></span>
                                    <div class="">
                                        <span>{{$endereco->ENDERECO_LOGRADOURO}}, </span>
                                        <span>{{$endereco->ENDERECO_NUMERO}} - </span>
                                        <span>{{$endereco->ENDERECO_CIDADE}} - </span>
                                        <span>{{$endereco->ENDERECO_ESTADO}}, </span>
                                        <span>{{$endereco->ENDERECO_CEP}}</span>
                                    </div>
                                    <span class="fw-semibold fst-italic">{{$endereco->ENDERECO_COMPLEMENTO}}</span>
                                </label>
                            </div>
                        @endforeach
                        <button type="button" id="drop_form" class="btn btn-light rounded-pill px-4 py-3 border my-4" value="show">Adicionar novo endereço</button>
                    @endif
                    <form action="{{ route('endereco.store') }}" method="post" class="{{$hideForm ?? ''}} row w-75 g-3 mb-5" id="form-endereco">
                        @csrf
                        <div class="col-3">
                            <input type="number" name="cep" id="cep" placeholder="CEP" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="col-2">
                            <input type="number" name="numero" id="numero" placeholder="Nº" class="rounded-pill text-center form-control form-control-lg">
                        </div>
                        <div class="col-7">
                            <input type="text" name="complemento" id="Complemento" placeholder="Complemento" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="col-12">
                            <input type="text" name="logradouro" id="logradouro" placeholder="Endereço" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="col-4">
                            <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="col-4">
                            <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="col-4">
                            <input type="text" name="uf" id="uf" placeholder="UF" class="rounded-pill form-control form-control-lg">
                        </div>
                        <div class="d-inline-flex">
                            <input type="text" name="rotulo" placeholder="Rotulo" class="rounded-pill form-control form-control-lg me-3">
                            <input type="submit" value="Salvar endereço" class="btn btn-light btn-lg rounded-pill w-50">
                        </div>
                    </form>

                    <span class="d-block fw-semibold pb-2">Tempo de entrega de 1-3 dias utéis.</span>

                    @foreach ($itens as $item)
                        <hr class="hr bg-light">
                        <div class="row py-4">
                            <div class="col-2">
                                <img src="{{$item->produto->produtoImagens[0]->IMAGEM_URL}}" width="140" class="img-fluid rounded-4">
                            </div>

                            <div class="col-6 vstack">
                                <div class="mb-3">
                                    <span class="fw-bold">Titulo: </span>
                                    <span class="d-block">{{ $item->produto->PRODUTO_NOME }}</span>
                                </div>

                                <div class="mb-3">
                                    <span class="fw-bold">Categoria: </span>
                                    <span class="d-block">{{ $item->produto->produtoCategoria->CATEGORIA_NOME }}</span>
                                </div>

                                @if ($item->produto->PRODUTO_DESCONTO > 0)
                                    <div class="mb-3">
                                        <span class="d-block fs-5 fw-semibold">R$ {{number_format( $item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2)}}</span>
                                        <span class="d-block fs-5 ms-2"><sup>R$ <s>{{ $item->produto->PRODUTO_PRECO }}</s></sup></span>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <span class="d-block fs-5 fw-semibold">R$ {{$item->produto->PRODUTO_PRECO}}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="col-4">
                                <form class="d-flex" action="{{route('carrinho.store', $item->PRODUTO_ID)}}" method="post">
                                    @csrf
                                    <div class="d-inline-flex align-middle text-center quantity">
                                        <button type="button" id="qtd-menos" class="btn btn-default" onclick="atualizarQtd(this, -1)">-</button>
                                        <input type="number" id="produto-qtd" class="border border-0 text-center" name="qtd" value="{{$item->ITEM_QTD}}" min="1" max="{{$item->produto->produtoEstoque->PRODUTO_QTD}}">
                                        <button type="button" id="qtd-mais" class="btn btn-default" onclick="atualizarQtd(this, 1)">+</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-4">
                    <div class="row">
                        <div class="col-12 bg-light rounded-top mb-2 p-4">
                            <span class="d-block fw-bold fs-5 mb-3">CUPOM DE DESCONTO</span>
                            <div class="row row-cols-2 align-items-center">
                                <div class="col-10">
                                    <form action="#" method="#">
                                        <input type="text" name="#" id="txt" class="form-control rounded-pill" placeholder="Digite seu cupom">
                                    </form>
                                </div>
                                <div class="col-2 bg-light rounded-top">
                                    <button type="button" class="btn btn-default p-0 border border-0 float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 bg-light rounded-bottom p-4">
                            <span class="fw-bold mb-3 h4 d-block">Detalhes do Pedido</span>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-normal fs-5 align-start">Preço total</span>
                                <span class="fw-normal fs-5">R$ {{number_format($precoTotal, 2)}}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-normal fs-5">Frete</span>
                                <span class="fw-normal fs-5">Gratis</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-normal fs-5">Desconto</span>
                                <span class="fw-normal fs-5">R$ {{number_format($descontoTotal, 2)}}</span>
                            </div>

                            <div class= "d-flex justify-content-between align-items-center py-4 border-1 border-top border-dark">
                                <span class="fw-bold fs-5">Valor total</span>
                                <span class="fw-semibold fs-5">R$ {{number_format($precoTotal - $descontoTotal, 2)}}</span>
                            </div>

                            <a href="{{route('confirmer')}}">
                                <input type="button" value="Ir Para Verificação de Dados" class="bg-black text-white rounded-pill w-100 py-2 text-align-center">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

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
<div class="container-xxl my-4">
    <nav aria-label="breadcrumb mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Carrinho</li>
        </ol>
    </nav>
</div>

<main class="container-xxl mb-5">
    <div class="row">
        <div class="col col-8">
            <div class="w-75 mb-5">
                <h2 class="mb-4">Informações de entrega</h2>

                <form class="row mb-3" id="form-endereco">
                    <div class="d-flex justify-content-between mb-3 ">
                        <input type="number" id="cep" placeholder="CEP" class="rounded-pill ps-3 w-25 py-2 form-control">
                        <input type="number" id="numero" placeholder="Nº" class="rounded-pill py-2 h-100 mb-3 text-center form-control">
                        <input type="text" id="Complemento" placeholder="Complemento" class="rounded-pill ps-3 py-2 w-50 form-control">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="logradouro" placeholder="Endereço" class="rounded-pill ps-3 w-100 py-3 form-control">
                    </div>

                    <div class="mb-3 d-flex">
                        <input type="text" id="bairro" placeholder="Bairro" class="rounded-pill py-3 ps-3 form-control w-50">
                    </div>

                    <div class="mb-3 d-flex">
                        <input type="text" id="cidade" placeholder="Cidade" class="rounded-pill ps-3 py-2 form-control me-3 w-50">
                        <input type="text" id="uf" placeholder="UF" class="rounded-pill h-100 py-2 mb-3 text-center form-control">
                    </div>

                    <div class="form-check mb-3 ms-3">
                        <input type="checkbox" id="input-check" class="form-control form-check-input me-2">
                        <label class="form-check-label" for="input-check">Salvar Endereço</label>
                    </div>
                </form>

                <span class="fw-semibold">Tempo de entrega de 1-3 dias utéis.</span>
            </div>

            @foreach ($itens as $item)
            <div class="row py-4 border-top">
                <div class="col col-2 me-3">
                    <img src="{{$item->produto->produtoImagens[0]->IMAGEM_URL}}" width="140" class="rounded-4">
                </div>

                <div class="col col-6 d-flex flex-column ">
                    <div class="mb-3">
                        <span class="fw-bold">Titulo: </span>
                        <span>{{ $item->produto->PRODUTO_NOME }}</span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-bold">Categoria: </span>
                        <span>{{ $item->produto->produtoCategoria->CATEGORIA_NOME }}</span>
                    </div>

                    @if ($item->produto->PRODUTO_DESCONTO > 0)
                        <div class="mb-3">
                            <span class="fs-5 fw-semibold">R$ {{number_format( $item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2)}}</span>
                            <span class="fs-5 ms-2"> <sup>R$ <s>{{ $item->produto->PRODUTO_PRECO }}</s> </sup> </span>
                        </div>
                    @else
                        <div class="mb-3">
                            <span class="fs-5 fw-semibold">R$ {{$item->produto->PRODUTO_PRECO}}</span>
                        </div>
                    @endif
                </div>

                <div class="col">
                    <form class="d-flex" action="{{route('carrinho.store', $item->PRODUTO_ID)}}" method="post">
                        @csrf
                        <div class="quantity">
                            <button type="button" id="qtd-menos" onclick="atualizaQtd(this, -1)">-</button>
                            <input type="number" id="produto-qtd" name="qtd" value="{{$item->ITEM_QTD}}" min="1" max="{{$item->produto->produtoEstoque->PRODUTO_QTD}}">
                            <button type="button" id="qtd-mais" onclick="atualizaQtd(this, 1)">+</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col">
            <div class="bg-light rounded p-3">
                <span class="fw-bold h4">Cupom de desconto</span>

                <div class="mt-3 d-flex align-items-center">
                    <input type="search" id="cupom "placeholder="Digite seu cupom" class="rounded-pill py-2 ps-3 w-75 me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" fill="currentColor" class="bi bi-arrow-right-circle-fill h-100" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </div>

            </div>

            <div class="bg-light rounded mt-3 p-3">
                <span class="fw-bold mb-3 h4 d-block">Preço do pedido</span>
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
                <input type="button" value="Ir Para Verificação de Dados" class="bg-black text-white rounded-pill w-100 py-2 text-align-center ">
            </div>
        </div>
    </div>
</main>

@endsection

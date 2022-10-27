@extends('layout')

@section('title', 'Carrinho')
@section('script', '/js/carrinho.js')
@section('style', '/css/produto.css')
@section('main')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button
        {
            -webkit-appearance: none;
            margin: 0;
        }
</style>

<main class="container-xxl">
    <span>Carrinho<span>
    <h2 class="fw-bold py-4">Carrinho</h2>
    <div class="row mt-3">
        <div class="col col-8">
            @foreach ($itens as $item)
            <div class="row py-4 border-top">

                <div class="col col-2 me-3">
                    <img src="{{$item->produto->produtoImagens[0]->IMAGEM_URL}}" width="140" class="rounded-4">
                </div>

                <div class="col col-6 py-2">

                    <div class="mb-3">
                        <span class="fw-bold">{{ $item->produto->PRODUTO_NOME }}</span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-bold">{{ $item->produto->produtoCategoria->CATEGORIA_NOME }}</span>
                    </div>


                    <div class="d-flex flex-column col col-3 justify-content-between py-2">
                        <div class="d-flex justify-content-between align-items-center">

                            @if ($item->produto->PRODUTO_DESCONTO > 0)
                                <div class="">
                                    <span class="fw-semibold fs-5">R$ {{number_format( $item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2)}}</span>
                                    <span class="fs-5 fw-semibold text-decoration-line-through">R$ {{ $item->produto->PRODUTO_PRECO }}</span>
                                </div>
                            @else
                                <span class="fw-semibold fs-5">R$ {{$item->produto->PRODUTO_PRECO}}</span>
                            @endif

                        </div>

                        <form class="d-flex align-items-center" action="{{route('carrinho.store', $item->PRODUTO_ID)}}" method="post">
                            @csrf
                            <div class="quantity">
                                <button type="button" id="qtd-menos" onclick="atualizaQtd(this, -1)">-</button>
                                <input type="number" id="produto-qtd" name="qtd" value="{{$item->ITEM_QTD}}" min="1" max="{{$item->produto->produtoEstoque->PRODUTO_QTD}}">
                                <button type="button" id="qtd-mais" onclick="atualizaQtd(this, 1)">+</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="w-75">
                <h2 class="mt-5 mb-4">Informações de entrega</h2>
                <div class="row mb-3">
                    <div class="col col-3">
                        <input type="number" id="cep" placeholder="CEP" class="rounded-pill ps-3 w-100 py-2 form-control">
                    </div>

                    <div class="col col-3">
                        <input type="number" id="numero" placeholder="Nº" class="rounded-pill w-75 py-2 mb-3 text-center form-control">
                    </div>

                    <div class="d-flex">
                        <input type="text" id="Complemento" placeholder="Complemento" class="rounded-pill ps-3 py-2 w-50 form-control">
                    </div>

                    <div class="col col-9">
                        <input type="text" id="logradouro" placeholder="Endereço" class="rounded-pill ps-3 w-100 py-2 form-control">
                    </div>



                    <div class="col col-9">
                        <input type="text" id="bairro" placeholder="Bairro" class="rounded-pill w-75 py-2 mb-3 form-control">
                    </div>

                    <div class="col col-9">
                        <input type="text" id="cidade" placeholder="Cidade" class="rounded-pill ps-3 w-100 py-2 form-control">
                    </div>

                    <div class="col col-2">
                        <input type="text" id="uf" placeholder="UF" class="rounded-pill w-75 py-2 mb-3 text-center form-control">
                    </div>


                </div>
                <span class="fw-semibold">Tempo de entrega de 1-3 dias utéis.</span>
            </div>
        </div>
        <div class="col">
            <div class="bg-light rounded p-3">
                <h4 class="fw-bold">Cupom de desconto</h4>
                <input type="search" placeholder="Digite seu cupom" class="rounded-pill w-75 py-2 ps-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
            </div>
            <div class="bg-light rounded mt-3 p-3">
                <h4 class="fw-bold">Preço do pedido</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-normal fs-5 align-start">Preço total</span>
                            <span class="fw-normal fs-5">R$39,12</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-normal fs-5">Frete</span>
                            <span class="fw-normal fs-5">R$</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fw-normal fs-5">Desconto</span>
                            <span class="fw-normal fs-5">R$</span>
                        </div>
                        <div class= "d-flex justify-content-between align-items-center py-4 border-1 border-top border-dark">
                            <span class="fw-bold fs-5">Valor total</span>
                            <span class="fw-semibold fs-5">R$</span>
                        </div>
                <input type="button" value="Ir Para..." class="bg-black text-white rounded-pill w-100 py-2 text-align-center ">
            </div>
        </div>
    </div>
</main>

@endsection

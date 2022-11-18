@extends('layout')

@section('style', '/css/produto.css')
@section('title', $produto->PRODUTO_NOME)

@section('script','/js/produto.js')

@section('main')
    <main role="main">
        <div class="container-xxl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('catalogo')}}" class="link">Livros</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categoria.show',$produto->produtoCategoria->CATEGORIA_ID)}}" class="link">{{ ucfirst($produto->produtoCategoria->CATEGORIA_NOME) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $produto->PRODUTO_NOME }}</li>
                </ol>
            </nav>
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

        <div class="container-xxl">
            <div class="row row-cols-2 mx-xl-0">
                <div class="col-5 mx-auto">
                    <div class="d-flex justify-content-center books-pictures">
                        <div class="me-3 destaque">
                            @if (isset($produto->produtoImagens[0]))
                                <img id="book-picture" src="{{$produto->produtoImagens[0]->IMAGEM_URL}}" alt="" width="320" class="img-fluid">
                            @else
                                <img class="mb-2 book-pictures" src="https://via.placeholder.com/223x300/F8F8F8/CCC?text=Sem%20Imagem" alt="" width="320">
                            @endif
                        </div>
                        <div class="side-pictures overflow-auto">
                            @if (isset($produto->produtoImagens[0]))
                                @foreach($produto->produtoImagens as $imagem)
                                    <img class="mb-2 book-pictures" src="{{$imagem->IMAGEM_URL}}" alt="" width="125" class="img-fluid">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-5 mx-auto">
                    <div class="row">
                        <div class="col">
                            <span class="fs-3 fw-bold">{{ $produto->PRODUTO_NOME }}</span>

                            <div class="my-3">
                                @if ($produto->PRODUTO_DESCONTO > 0)
                                    <span class="fs-3 me-2 fw-bold">R$ {{number_format( $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO, 2)}}</span>
                                    <span class="fs-5 fw-bold text-decoration-line-through">R$ {{ $produto->PRODUTO_PRECO }}</span>
                                @else
                                    <span class="fs-3 fw-bold">R$ {{$produto->PRODUTO_PRECO}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <span class="d-block fs-6 mb-2">Tipo de Mídia</span>

                            <div class="hstack gap-4">
                                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border w-25">Fisico</button>
                                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border w-25">Digital</button>
                            </div>

                            <span class="d-block fs-6 mt-4 mb-2">Tipo de Capa</span>

                            <div class="hstack gap-4">
                                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border w-25">Normal</button>
                                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border w-25">Dura</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            @if($produto->produtoEstoque?->PRODUTO_QTD > 0)
                                <span class="d-block mt-4 fw-semibold">Quantidade em Estoque: {{$produto->produtoEstoque?->PRODUTO_QTD}}</span>
                            @endif

                            <div class="d-flex justify-content-between bg-light align-items-center p-4 my-4 rounded shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <span class="ms-2">Frete grátis acima de R$ 150 - Exceto para Norte e Nordeste</span>
                            </div>

                            @if($produto->produtoEstoque?->PRODUTO_QTD > 0)
                                <form class="row row-cols-1 row-cols-xl-2 align-items-center justify-content-between" action="{{route('carrinho.store', $produto->PRODUTO_ID)}}" method="post">
                                    @csrf
                                    {{-- d-flex  --}}
                                    <div class="col-12 col-xl-4">
                                        <div class="d-flex justify-content-between justify-content-xl-center p-2 rounded-pill border border-1 border-dark mx-auto mx-xl-0 mt-4 mt-xl-0 prod">
                                            <button type="button" id="qtd-menos" class="btn btn-default border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                                </svg>
                                            </button>
                                            <input type="number" class="form-control w-auto text-center border-0 shadow-none" id="produto-qtd" name="qtd" value="1" min="1" max="{{$produto->produtoEstoque->PRODUTO_QTD}}">
                                            <button type="button" id="qtd-mais" class="btn btn-default border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-8 d-flex justify-content-xl-end mt-4 mt-xl-0">
                                        <div class="d-flex align-items-center mx-auto mx-xl-0">
                                            <button type="submit" class="btn btn-dark rounded-pill" style="padding: .8rem 3rem">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Adicionar ao carrinho</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <span class="d-block">Produto esgotado</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-10 mx-auto">
                    <div class="d-block description-container">
                        <span class="d-block fs-3 mb-3 fw-bold display-2">Sinopse</span>
                        <p class="d-block lh-lg">{{ $produto->PRODUTO_DESC }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('layout')

@section('style', '/css/produto.css')
@section('title', $produto->PRODUTO_NOME)

@section('script','/js/produto.js')

@section('main')
    <div class="my-4 container-xxl">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('catalogo')}}">Livros</a></li>
                <li class="breadcrumb-item"><a href="{{route('categoria.show',$produto->produtoCategoria->CATEGORIA_ID)}}">{{ ucfirst($produto->produtoCategoria->CATEGORIA_NOME) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produto->PRODUTO_NOME }}</li>
            </ol>
        </nav>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>


    <main class="container-xxl">
        <div class="d-flex justify-content-center">
            <div class="col col-5">
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

            <div class="ms-5 col col-5 d-flex flex-column">
                <span class="fs-3 fw-bold">{{ $produto->PRODUTO_NOME }}</span>

                <div class="my-4">
                    @if ($produto->PRODUTO_DESCONTO > 0)
                        <span class="fs-3 me-2 fw-bold">R$ {{number_format( $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO, 2)}}</span>
                        <span class="fs-5 fw-bold text-decoration-line-through">R$ {{ $produto->PRODUTO_PRECO }}</span>
                    @else
                        <span class="fs-3 fw-bold">R$ {{$produto->PRODUTO_PRECO}}</span>
                    @endif
                </div>


                <div class="row d-flex flex-column mb-4">
                    <span class="fs-6 mb-2">Tipo de Midia</span>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-light rounded-pill me-2 px-4 py-2 fw-semibold border" data-bs-toggle="button">Fisico</button>
                        <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border" data-bs-toggle="button">Digital</button>
                    </div>
                </div>
                <div class="row d-flex flex-column ">
                    <span class="fs-6 mb-2">Tipo de Capa</span>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-light rounded-pill me-2 px-4 py-2 fw-semibold border" data-bs-toggle="button">Normal</button>
                        <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold border" data-bs-toggle="button">Dura</button>
                    </div>
                </div>

                @if($produto->produtoEstoque?->PRODUTO_QTD > 0)
                    <span class="d-block mt-4">Quantidade em Estoque: {{$produto->produtoEstoque?->PRODUTO_QTD}}</span>
                @endif

                <div class="d-flex flex-row bg-light align-items-center p-4 my-4 rounded">
                    <i class="bi bi-cart fs-3 me-3"></i>
                    <span>Frete gratis acima de R$ 150 - exceto para Norte e Nordeste</span>
                </div>

                @if($produto->produtoEstoque?->PRODUTO_QTD > 0)
                    <form class="d-flex align-items-center" action="{{route('carrinho.store', $produto->PRODUTO_ID)}}" method="post">
                        @csrf
                        <div class="quantity">
                            <button type="button" id="qtd-menos">-</button>
                            <input type="number" id="produto-qtd" name="qtd" value="1" min="1" max="{{$produto->produtoEstoque->PRODUTO_QTD}}">
                            <button type="button" id="qtd-mais">+</button>
                        </div>

                        <div class="h-100">
                            <button type="submit" class="btn btn-dark rounded-pill px-5 py-2 h-100">
                                <img class=" pe-2 py-1" src="assets/produto/carrinho.svg" alt="">
                                <span class="">Adicionar ao carrinho</span>
                            </button>
                        </div>
                    </form>
                @else
                    <p>Produto esgotado</p>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 mb-5">
            <div class="description-container">
                <span class="d-block fs-3 mb-3 fw-bold display-2">Sinopse</span>
                <p class=" d-block lh-lg" style="text-align: justify;">{{ $produto->PRODUTO_DESC }}</p>
            </div>
        </div>
    </main>
@endsection

@extends('layout')
@section('style', '/css/catalogo.css')

@if (Route::currentRouteName() == 'categoria.show')
    @section('title', 'Livros de ' . Route::current()->categoria->CATEGORIA_NOME)
@else
    @section('title', 'Catalogo')
@endif

@section('script', '/js/catalogo.js')
@section('filtro', '/js/filtro.js')

@section('main')
    <main role="main">
        <div class="container-xxl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (Route::currentRouteName() == 'categoria.show')
                        <li class="breadcrumb-item"><a class="link" href="{{route('catalogo')}}">Livros</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ucfirst(Route::current()->categoria->CATEGORIA_NOME)}}</li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">Livros<li>
                    @endif
                </ol>
            </nav>
        </div>

        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col-lg-3 col-11 mb-5 mb-lg-0 mt-md-0 mx-auto">
                    <div class="d-block bg-light p-4 shadow-sm">
                        <span class="d-block fw-bold" id="filter">FILTROS:</span>

                        <button class="btn btn-default d-inline-flex justify-content-between align-items-center mt-4 p-0 w-100 order-btn" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="#collapse1">
                            <span class="d-block fw-bold" id="order">ORDENAR POR</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash ms-2" viewBox="0 0 16 16" id="btnOrder">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </button>

                        <div class="collapse mt-2" id="collapse1">
                            <ul class="list-unstyled ms-4 lh-lg d-flex flex-column">
                                <li class="{{($order_az) ? 'order-first border-bottom pb-2 fw-bold' : ''}}">
                                    <a href="{{($order_az) ? route('catalogo') : '?order=a-z'}}" class="link text-decoration-none text-dark">Livro: A - Z</a>
                                </li>

                                <li class="{{($order_za) ? 'order-first border-bottom pb-2 fw-bold' : ''}}">
                                    <a href="{{($order_za) ? route('catalogo') : '?order=z-a'}}" class="link text-decoration-none text-dark">Livro: Z - A</a>
                                </li>

                                <li class="{{($order_menor_preco) ? 'order-first border-bottom pb-2 fw-bold' : ''}}">
                                    <a href="{{($order_menor_preco) ? route('catalogo') : '?order=menores-precos'}}" class="link text-decoration-none text-dark">Menores Preços</a>
                                </li>

                                <li class="{{($order_maior_preco) ? 'order-first border-bottom pb-2 fw-bold' : ''}}">
                                    <a href="{{($order_maior_preco) ? route('catalogo') : '?order=maiores-precos'}}" class="link text-decoration-none text-dark">Maiores Preços</a>
                                </li>
                            </ul>
                        </div><!-- 1 -->

                        <button class="btn btn-default d-inline-flex justify-content-between align-items-center mt-4 p-0 w-100 order-btn" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="#collapse2">
                            <span class="d-block fw-bold" id="categorie">CATEGORIAS</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash ms-2" viewBox="0 0 16 16" id="btnCategory">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </button>

                        <div class="collapse mt-2" id="collapse2">
                            <ul class="list-unstyled ms-4 lh-lg d-flex flex-column px-0">
                                @if (Route::currentRouteName() == 'categoria.show')
                                    @foreach (App\Models\Categoria::ativo() as $categoria)
                                        @if (Route::current()->categoria->CATEGORIA_ID == $categoria['id'])
                                            <li class="order-first border-bottom pb-2">
                                                <a href="{{route('categoria.show', $categoria['id'])}}" class="link text-decoration-none text-dark fw-bold">{{$categoria['nome']}} ({{$categoria['quantidade']}})</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route('categoria.show', $categoria['id'])}}" class="link text-decoration-none text-dark">{{$categoria['nome']}} ({{$categoria['quantidade']}})</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach (App\Models\Categoria::ativo() as $categoria){{-- Aparece na catalogo --}}
                                        <li>
                                            <a href="{{route('categoria.show', $categoria['id'])}}" class="link text-decoration-none text-dark">{{$categoria['nome']}} ({{$categoria['quantidade']}}) </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div><!-- 2 -->

                    </div>
                </div>

                <div class="col-lg-9 col-11 mt-5 mt-lg-0 mx-auto">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
                        @foreach ($produtos as $produto)
                            @if ($produto->produtoEstoque != null && $produto->produtoEstoque->PRODUTO_QTD > 0)
                                <div class="col d-flex justify-content-center my-2">
                                    <a href="{{route('produto.show', $produto->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                        <figure class="figure">
                                            <div class="overflow-hidden rounded-4 mb-3 div">
                                                @if (isset($produto->produtoImagens[0]))
                                                    <img src="{{$produto->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                @else
                                                    <img src="https://via.placeholder.com/177x265/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                @endif
                                            </div>

                                            <figcaption class="figure-caption text-dark fw-semibold position-relative">
                                                <span class="d-block fs-5 name">{{$produto->PRODUTO_NOME}}</span>
                                                @if ($produto->PRODUTO_DESCONTO > 0)
                                                    <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5 desconto" style="{{isset($produto->produtoEstoque->PRODUTO_ID) && $produto->produtoEstoque->PRODUTO_QTD != 0 ? '' : 'filter: grayscale(85%);'}}">{{number_format($produto->PRODUTO_DESCONTO / $produto->PRODUTO_PRECO * 100, 0)}}%</span>
                                                    <div class="d-flex">
                                                        <span class="fw-semibold me-3 fs-5">R$ {{number_format($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO, 2)}}</span>
                                                        <span class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></span>
                                                    </div>
                                                @else
                                                    <div class="d-block">
                                                        <span class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</span>
                                                    </div>
                                                @endif
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{$produtos->onEachSide(3)->links()}}
                </div>

                

            </div>
        </div>
    </main>
@endsection

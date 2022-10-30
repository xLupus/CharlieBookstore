@extends('layout')
@section('style', '/css/catalogo-bootstrap.css')

@if (Route::current()->getName() == 'categoria.show')
    @section('title', 'Livros de '.Route::current()->categoria->CATEGORIA_NOME)
@else
    @section('title', 'Catalogo')
@endif

@section('script','/js/catalogo.js')

@section('main')
    <div class="container-xxl my-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (Route::current()->getName() == 'categoria.show')
                    <li class="breadcrumb-item">
                        <a class="link" href="{{ route('catalogo') }}">Livros</a>
                    </li>
                    <li class="breadcrumb-item active">{{ucfirst(Route::current()->categoria->CATEGORIA_NOME)}}</li>
                @else
                    <li class="breadcrumb-item active">Livros<li>
                @endif
            </ol>
        </nav>
    </div>

    <main role="main">
        <div class="container-xxl mb-5">
            <div class="row row-cols-2 gx-5">
                <div class="col-3 pe-5">
                    <div class="d-block bg-light p-4 shadow-sm">
                        <span class="d-block fw-bold" id="filter">FILTROS:</span>

                        <button class="btn btn-default d-inline-flex align-items-center mt-4 p-0 order-btn" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="#collapse1">
                            <span class="d-block fw-bold" id="order">ORDENAR POR</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash ms-2" viewBox="0 0 16 16" id="btnOrder">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </button>

                        <div class="collapse mt-2" id="collapse1">
                            <ul class="list-unstyled ms-4 lh-lg">
                                <li><a href="?order=a-z" class="link text-decoration-none text-dark">Livro: A - Z</a></li>
                                <li><a href="?order=z-a" class="link text-decoration-none text-dark">Livro: Z - A</a></li>
                                <li><a href="?order=menores-precos" class="link text-decoration-none text-dark">Menores Preços</a></li>
                                <li><a href="?order=maiores-precos" class="link text-decoration-none text-dark">Maiores Preços</a></li>
                            </ul>
                        </div><!-- 1 -->

                        <button class="btn btn-default d-inline-flex align-items-center mt-4 p-0 order-btn" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="#collapse2">
                            <span class="d-block fw-bold" id="categorie">CATEGORIAS</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash ms-2" viewBox="0 0 16 16" id="btnCategory">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </button>

                        <div class="collapse mt-2" id="collapse2">
                            <ul class="list-unstyled ms-4 lh-lg d-flex flex-column px-0">
                                @if (Route::current()->getName() == 'categoria.show')
                                    @foreach (App\Models\Categoria::ativo() as $categoria)
                                        @if (Route::current()->categoria->CATEGORIA_ID == $categoria['id'])
                                            <li class="order-first border-bottom pb-2">
                                                <a href="{{route('categoria.show', $categoria['id'])}}" class="link text-decoration-none text-dark fw-bold">{{$categoria['nome']}} ({{$categoria['quantidade']}}) </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route('categoria.show', $categoria['id'])}}" class="link text-decoration-none text-dark">{{$categoria['nome']}} ({{$categoria['quantidade']}}) </a>
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

                        <button class="btn btn-default d-inline-flex align-items-center mt-4 p-0 order-btn" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="#collapse3">
                            <span class="d-block fw-bold" id="price">FAIXA DE PREÇO</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash ms-2" viewBox="0 0 16 16" id="btnPrice">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </button>

                        <div class="collapse mt-2" id="collapse3">
                            <form action="#">
                                <label for="range" class="form-label">Preço Mínimo</label>
                                <input type="range" class="form-range" min="0" max="100" value="10" id="range">

                                <label for="range" class="form-label mt-2">Preço Máximo</label>
                                <input type="range" class="form-range" min="0" max="100" value="75" id="range">
                            </form>
                        </div><!-- 3 -->
                    </div>
                </div>

                <div class="col-9">
                    <div class="row row-cols-4">
                        @foreach ($produtos as $produto)
                            <div class="col">
                                <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}">
                                    <figure class="figure">
                                        @if (isset($produto->produtoImagens[0]))
                                            <img src="{{$produto->produtoImagens[0]->IMAGEM_URL}}" alt="" class="figure-img img-fluid">
                                        @else
                                            <img src="https://via.placeholder.com/223x300/F8F8F8/CCC?text=Sem%20Imagem" alt="" class=" figure-img img-fluid">
                                        @endif

                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                            <span class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></span>
                                            @if ($produto->PRODUTO_DESCONTO > 0)
                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5 desconto">{{number_format($produto->PRODUTO_DESCONTO / $produto->PRODUTO_PRECO * 100, 0)}}%</span>
                                                <div class="d-flex">
                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO, 2) }}</span>
                                                    <span class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></span>
                                                <div>
                                            @else
                                                <div class="">
                                                    <span class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</span>
                                                </div>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

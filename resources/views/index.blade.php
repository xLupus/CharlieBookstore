@extends('layout')

@section('main')
    <main role="main">
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-4">
                    <img src="/img/Image.png" alt="image" class="img-fluid position-relative" style="right: .8rem;">
                </div>
                <div class="col-6">
                    <p class="lh-1" style="font-size: 100px; margin-top: 7%; margin-left: 14%;">A sua <br> Livraria <br> Online</p>
                    <p class="fs-4" style="margin-top: 5%; margin-left: 14%;">Conheça nosso acervo literário!</p>
                    <div class="d-flex col-6 ms-5" style="margin-top: 5%;">
                        <button type="button" class="btn btn-default text-white w-100 p-2 fs-3" style="background-color: #90BDD2;  margin-left: 14%;">Conferir</button>
                    </div>
                </div>
                <div class="col-2">
                    <img src="/img/Circle.png" alt="circle" class="img-fluid position-relative float-end" style="left: .75rem;">
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <p class="fs-3 fw-bold" style="margin-left: 5%;">Categorias</p>
                </div>

                <div class="col-10 mx-auto mt-2 mb-5">
                    <div class="row row-cols-6 gy-3 gx-4 text-center">
                        @foreach($categorias as $categoria)
                            <div class="col">
                                <div class="p-3 border bg-light">{{$categoria->CATEGORIA_NOME}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <p class="fs-3 fw-bold" style="margin-left: 5%;">Livros em Alta</p>
                </div>

                <div class="col-10 mx-auto mt-2 mb-1"><!-- carousel 1 -->
                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="4500">
                                <div class="row row-cols-5 g-5">
                                    @foreach($produtos as $produto)
                                        @foreach($produto->produtoImagens as $imagem)
                                            @if($imagem->IMAGEM_ID <= 5 && $produto->PRODUTO_ATIVO == 1)
                                                @switch($imagem->IMAGEM_ID)
                                                    @case(1) @case(2)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(3)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure d-grid justify-content-center">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(4) @case(5)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure float-end">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @default
                                                        @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row row-cols-5 g-5">
                                    @foreach($produtos as $produto)
                                        @foreach($produto->produtoImagens as $imagem)
                                            @if($imagem->IMAGEM_ID > 5 && $produto->PRODUTO_ATIVO == 1)
                                                @switch($imagem->IMAGEM_ID)
                                                    @case(6) @case(7)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(8)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure d-grid justify-content-center">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(9) @case(10)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure float-end">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="{{$imagem->IMAGEM_URL}}" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6">
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <p class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @default
                                                        @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev rounded-circle" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next rounded-circle" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-12 mt-5 mb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-5 py-2 fs-4">Conferir Lista</button>
                </div>

                <div class="col-12 mt-5">
                    <p class="fs-3 fw-bold" style="margin-left: 5%;">Maiores Descontos</p>
                </div>

                <div class="col-10 mx-auto mt-2 mb-1"><!-- carousel 2 -->
                    <div id="carouselControls2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="4500"><!-- item 1 -->
                                <div class="row row-cols-5 g-5">
                                    @foreach($produtos as $produto)
                                        @foreach($produto->produtoImagens as $imagem)
                                            @if($imagem->IMAGEM_ID <= 5 && $produto->PRODUTO_ATIVO == 1)
                                                @switch($imagem->IMAGEM_ID)
                                                    @case(1) @case(2)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(3)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure d-grid justify-content-center">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(4) @case(5)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure float-end">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @default
                                                        @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div><!-- // -->

                            <div class="carousel-item"><!-- item 2 -->
                                <div class="row row-cols-5 g-5">
                                    @foreach($produtos as $produto)
                                        @foreach($produto->produtoImagens as $imagem)
                                            @if($produto->PRODUTO_ID > 5 && $produto->PRODUTO_ATIVO == 1)
                                                @switch($imagem->IMAGEM_ID)
                                                    @case(6) @case(7)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(8)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure d-grid justify-content-center">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @case(9) @case(10)
                                                        <div class="col">
                                                            <div class="d-block">
                                                                <figure class="figure float-end">
                                                                    <img src="/img/{{$imagem->IMAGEM_URL}}" alt="book4" class="figure-img img-fluid">
                                                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                        <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5" style="bottom: 6.5rem; width: 4.5rem; left: 12rem">15%</span>
                                                                        <p class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></p>
                                                                        <div class="d-flex">
                                                                            <p class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></p>
                                                                            <p class="fw-semibold ms-4 fs-5">R$ {{$produto->PRODUTO_DESCONTO}}</p>
                                                                        </div>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        @break

                                                    @default
                                                        @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div><!-- // -->
                        </div>

                        <button class="carousel-control-prev rounded-circle" type="button" data-bs-target="#carouselControls2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next rounded-circle" type="button" data-bs-target="#carouselControls2" data-bs-slide="next">
                            <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-12 mt-5 mb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-5 py-2 fs-4">Conferir Lista</button>
                </div>

                <div class="col-12 mt-5" style="background: linear-gradient(#B75C3D, #60392C);">
                    <div class="row row-cols-2">
                        <div class="col-4">
                            <img src="/img/footerImg.png" alt="" class="img-fluid ms-3">
                        </div>
                        <div class="col-8 my-auto text-white">
                            <p class="fs-6 fw-bold text-dark ms-5">NOVO LANÇAMENTO</p>
                            <h1 class="display-3 ms-5"><u>Mayah: A Hegemonia de Lavender</u></h1>
                            <div class="d-block mt-5 ms-5">
                                <button type="button" class="btn btn-outline-light rounded-pill fw-bold" style="padding: .8rem 5rem;">RESERVAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

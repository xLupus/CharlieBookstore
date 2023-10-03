@extends('layout')

@section('style', 'css/index.css')
@section('title', 'CharlieBookstore')

@section('main')
    <main role="main">
        <div class="container-fluid mb-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col-12 col-md-12 col-lg-4">
                    <img src="/img/Image.png" alt="image" class="img-fluid position-relative" style="right: .8rem;">
                </div>
                <div class="vstack col-12 col-md-9 col-lg-6 text-center text-md-none">
                    <span class="lh-1" id="txt1">A sua <br> Livraria <br> Online</span>
                    <span class="fs-4 mt-4" id="txt2">Conheça nosso acervo literário!</span>
                    <div class="mt-4">
                        <a href="{{route('catalogo')}}" class="btn btn-default w-75 p-2 fs-3 text-decoration-none text-white btn-conferir" role="button">Conferir</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 d-md-block">
                    <img src="/img/Circle.png" alt="circle" class="img-fluid position-relative float-end" style="left: .75rem;">
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 mb-3">
                    <span class="fs-3 fw-bold txt">Categorias</span>
                </div>

                <div class="col-10 mx-auto mt-2 mb-5">
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 gy-3 gx-4 text-center">
                        @foreach($categorias as $categoria)
                            <div class="col">
                                <a href="{{route('categoria.show',  $categoria->CATEGORIA_ID)}}" class="btn btn-default p-3 border rounded-0 bg-light w-100 text-decoration-none text-black categoria" role="button">{{$categoria->CATEGORIA_NOME}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 mt-5 mb-3">
                    <span class="fs-3 fw-bold txt">Livros em Alta</span>
                </div>

                <div class="col-10 mx-auto my-2"><!-- carousel 1 -->
                    <div id="carouselControls" class="carousel slide d-xl-block" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                    <figure class="figure">
                                                        <div class="overflow-hidden rounded-4 mb-3 div">
                                                            @if (isset($produtos[$i]->produtoImagens[0]))
                                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                            @else
                                                                <img src="https://via.placeholder.com/223x320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                            @endif
                                                        </div>

                                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                            <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                            @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                <div class="d-flex">
                                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                    <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                <div>
                                                            @else
                                                                <div class="d-block">
                                                                    <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                </div>
                                                            @endif
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 4; $i < 8; $i++)
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                    <figure class="figure">
                                                        <div class="overflow-hidden rounded-4 mb-3 div">
                                                            @if (isset($produtos[$i]->produtoImagens[0]))
                                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                            @else
                                                                <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                            @endif
                                                        </div>

                                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                            <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                            @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                <div class="d-flex">
                                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                    <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                <div>
                                                            @else
                                                                <div class="d-block">
                                                                    <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                </div>
                                                            @endif
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 8; $i < 12; $i++)
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                    <figure class="figure">
                                                        <div class="overflow-hidden rounded-4 mb-3 div">
                                                            @if (isset($produtos[$i]->produtoImagens[0]))
                                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                            @else
                                                                <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                            @endif
                                                        </div>

                                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                            <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                            @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                <div class="d-flex">
                                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                    <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                <div>
                                                            @else
                                                                <div class="d-block">
                                                                    <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                </div>
                                                            @endif
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    @endfor
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
                    </div>{{-- 4 --}}
                </div>

                <div class="col-12 mt-5 mb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-5 my-1 py-2 fs-4">Conferir Lista</button>
                </div>

                <div class="col-12 mt-5 mb-3">
                    <span class="fs-3 fw-bold txt">Maiores Descontos</span>
                </div>

                <div class="col-10 mx-auto my-2"><!-- carousel 2 -->
                    <div id="carouselControls5" class="carousel slide d-xl-block" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 0; $i < 4; $i++)
                                            <div class="col">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                        <figure class="figure">
                                                            <div class="overflow-hidden rounded-4 mb-3 div">
                                                                @if (isset($produtos[$i]->produtoImagens[0]))
                                                                    <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                                @else
                                                                    <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                                @endif
                                                            </div>

                                                            <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                                <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                                @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                    <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                    <div class="d-flex">
                                                                        <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                        <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                    <div>
                                                                @else
                                                                    <div class="d-block">
                                                                        <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                    </div>
                                                                @endif
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 4; $i < 8; $i++)
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                    <figure class="figure">
                                                        <div class="overflow-hidden rounded-4 mb-3 div">
                                                            @if (isset($produtos[$i]->produtoImagens[0]))
                                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                            @else
                                                                <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                            @endif
                                                        </div>

                                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                            <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                            @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                <div class="d-flex">
                                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                    <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                <div>
                                                            @else
                                                                <div class="d-block">
                                                                    <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                </div>
                                                            @endif
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="6500">
                                <div class="row row-cols-4 g-5">
                                    @for ($i = 8; $i < 12; $i++)
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                                    <figure class="figure">
                                                        <div class="overflow-hidden rounded-4 mb-3 div">
                                                            @if (isset($produtos[$i]->produtoImagens[0]))
                                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                            @else
                                                                <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                            @endif
                                                        </div>

                                                        <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                                            <span class="d-block fs-6 name">{{$produtos[$i]->PRODUTO_NOME}}</span>
                                                            @if ($produtos[$i]->PRODUTO_DESCONTO > 0)
                                                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produtos[$i]->PRODUTO_DESCONTO / $produtos[$i]->PRODUTO_PRECO * 100, 0)}}%</span>
                                                                <div class="d-flex">
                                                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produtos[$i]->PRODUTO_PRECO - $produtos[$i]->PRODUTO_DESCONTO, 2) }}</span>
                                                                    <span class="fw-semibold"><s>R$ {{$produtos[$i]->PRODUTO_PRECO}}</s></span>
                                                                <div>
                                                            @else
                                                                <div class="d-block">
                                                                    <span class="fw-semibold fs-5">R$ {{$produtos[$i]->PRODUTO_PRECO}}</span>
                                                                </div>
                                                            @endif
                                                        </figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev rounded-circle" type="button" data-bs-target="#carouselControls5" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next rounded-circle" type="button" data-bs-target="#carouselControls5" data-bs-slide="next">
                            <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>{{-- 4 --}}
                </div>

                <div class="col-12 mt-5 mb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-5 my-1 py-2 fs-4">Conferir Lista</button>
                </div>
            </div>
        </div>
    </main>
@endsection

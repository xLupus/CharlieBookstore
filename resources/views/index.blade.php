@extends('layout')

@section('style', 'css/index.css')
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
                        <button type="button" class="btn btn-default text-white w-100 p-2 fs-3 btn-conferir"><a href="#" class="link text-decoration-none text-white">Conferir</a></button>
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
                                <button class="p-3 border bg-light w-100"><a href="#" class="link text-decoration-none text-black">{{$categoria->CATEGORIA_NOME}}</a></button>
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
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="carousel">
                                            <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}"  class="link text-decoration-none text-black">
                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="" width="223">
                                                <p>{{$produtos[$i]->PRODUTO_NOME}}</p>
                                                <p>{{$produtos[$i]->PRODUTO_PRECO}}</p>
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="4500">
                                <div class="row row-cols-5 g-5">
                                    @for ($i = 5; $i < 10; $i++)
                                        <div>
                                            <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}" class="link text-decoration-none text-black">
                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="" width="223">
                                                <p>{{$produtos[$i]->PRODUTO_NOME}}</p>
                                                <p>{{$produtos[$i]->PRODUTO_PRECO}}</p>
                                            </a>
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

                            <div class="carousel-item active" data-bs-interval="4500">
                                <div class="row row-cols-5 g-5">
                                    @for ($i = 5; $i < 10; $i++)
                                        <div class="carousel">
                                            <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}"  class="link text-decoration-none text-black">
                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="" width="223">
                                                <p>{{$produtos[$i]->PRODUTO_NOME}}</p>
                                                <p>{{$produtos[$i]->PRODUTO_PRECO}}</p>
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="carousel-item" data-bs-interval="4500">
                                <div class="row row-cols-5 g-5">
                                    @for ($i = 5; $i < 10; $i++)
                                        <div class="carousel">
                                            <a href="{{route('produto.show', $produtos[$i]->PRODUTO_ID)}}"  class="link text-decoration-none text-black">
                                                <img src="{{$produtos[$i]->produtoImagens[0]->IMAGEM_URL}}" alt="" width="223">
                                                <p>{{$produtos[$i]->PRODUTO_NOME}}</p>
                                                <p>{{$produtos[$i]->PRODUTO_PRECO}}</p>
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>
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
                            <h1 class="display-3 ms-5">Mayah - Lavender</h1>
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

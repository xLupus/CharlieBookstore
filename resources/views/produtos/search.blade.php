@extends('layout')

@section('title', "Pesquisa para $pesquisa")
@section('style' , '/css/pesquisa.css')

@section('main')
    <main role="main">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12 mb-3">
                    <span>A PESQUISA POR: "<strong>{{$pesquisa}}</strong>",</span>
                    <span>RETORNOU: <strong>{{$resultados}}</strong> RESULTADOS</span>
                </div>
            </div>

            @if ($resultados == 0)
                <div class="row">
                    <div class="col-12">
                        <div class="bg-light mb-5 py-2">
                            <span class="d-block ms-3 my-3">Lamentamos que você não tenha encontrado o que procura, mas antes de desistir:</span>

                            <ul class="my-0 py-3 ms-3">
                                <li class="mb-3">Verifique se voce digitou corretamente o que procura;</li>
                                <li class="mb-3">Tente palavras menos específica;</li>
                                <li class="mb-3">Tente palavras-chave diferentes;</li>
                                <li class="mb-3">Se não encontrar o que procura, tente encontrar manualmente.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mt-4">
                    @foreach ($produtos as $produto)
                        <div class="col d-flex justify-content-center my-3">
                            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}" class="link text-decoration-none text-dark">
                                <figure class="figure">
                                    <div class="overflow-hidden rounded-4 mb-3 div">
                                        @if (isset($produto->produtoImagens[0]))
                                            <img src="{{$produto->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid" style="{{isset($produto->produtoEstoque->PRODUTO_ID) && $produto->produtoEstoque->PRODUTO_QTD != 0 ? '' : 'filter: grayscale(85%);'}}">
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
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{$produtos->links()}}
                </div>
            @endif
        </div>
    </main>
@endsection

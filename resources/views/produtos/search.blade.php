@extends('layout')

@section('title', "Pesquisa para $pesquisa")
@section('style' , '/css/pesquisa.css')

@section('main')
    <main class="container-xxl my-4">
        <div class="my-4">
            <span>A PESQUISA POR "<strong>{{$pesquisa}}</strong>"</span>
            <span>RETORNOU: <strong>{{$resultados}}</strong> RESULTADOS</span>
        </div>

        @if ($resultados == 0)
            <div class="bg-light mb-5 py-3">
                <span class="d-block ms-3 my-3">Lamentamos que você não tenha encontrado o que procura, mas antes de desistir:</span>

                <ul class="my-0 py-3 ms-3">
                    <li class="mb-3">Verifique se voce digitou corretamente o que procura;</li>
                    <li class="mb-3">Tente palavras menos específica;</li>
                    <li class="mb-3">Tente palavras-chave diferentes;</li>
                    <li class="mb-3">Se não encontrar o que procura, tente encontrar manualmente.</li>
                </ul>
            </div>
        @else
            <div class="row row-cols-5 g-5 mt-4">
                @foreach ($produtos as $produto)
                    <div class="col">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}}}" class="link text-decoration-none text-dark">
                                <figure class="figure">
                                    <div style="width: 223px; height: 320px" class="overflow-hidden rounded-4">
                                        @if (isset($produto->produtoImagens[0]))
                                            <img src="{{$produto->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid" style="{{isset($produto->produtoEstoque->PRODUTO_ID) && $produto->produtoEstoque->PRODUTO_QTD != 0 ? '' : 'filter: grayscale(85%);'}}">
                                        @else
                                            <img src="https://via.placeholder.com/223x320/F8F8F8/CCC?text=Sem%20Imagem" alt="...">
                                        @endif
                                    </div>

                                    <figcaption class="figure-caption text-dark fw-semibold fs-6 position-relative">
                                        <span class="mt-2"><small>{{$produto->PRODUTO_NOME}}</small></span>
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
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{$produtos->links()}}
            </div>
        @endif
    </main>
@endsection

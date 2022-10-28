@extends('layout')

@section('title', "Pesquisa para $pesquisa")
@section('main')
    <div class="container-xxl my-5">
        <div class="mb-4">
            <span>A PESQUISA POR "<strong>{{$pesquisa}}</strong>"</span>
            <span>RESULTOU EM: <strong>{{$resultados}}</strong> RESULTADOS</span>
        </div>

        @if ($produtos->count() == 0)
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
            <div class="d-flex flex-wrap gap-4 ps-4">
            @foreach ($produtos as $produto)
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
                                <span class="badge rounded-0 rounded-start position-absolute translate-middle bg-danger fs-5">{{number_format($produto->PRODUTO_DESCONTO / $produto->PRODUTO_PRECO * 100, 0)}}%</span>
                                <div class="d-flex">
                                    <span class="fw-semibold me-3 fs-5">R$ {{ number_format($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO, 2) }}</span>
                                    <span class="fw-semibold"><s>R$ {{$produto->PRODUTO_PRECO}}</s></span>
                                </div>
                            @else
                                <div class="">
                                    <span class="fw-semibold fs-5">R$ {{$produto->PRODUTO_PRECO}}</span>
                                </div>
                            @endif
                        </figcaption>
                    </figure>
                </a>
            @endforeach
            </div>
        @endif
    </div>
@endsection

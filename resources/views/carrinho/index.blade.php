@extends('layout')

@section('title', 'Carrinho')
@section('script', '/js/carrinho.js')
@section('style', '/css/carrinho.css')

@section('main')
    <main role="main">
        <div class="container-xxl mb-5">
            <div class="row cart">
                <div class="col-12 mb-3">
                    <span class="d-block fs-3 fw-bold">CARRINHO</span>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-2 justify-content-center gx-lg-4 gx-xxl-5">
                <div class="col-11 col-lg-7 col-xxl-8">
                    <div class="row">
                        <div class="col">
                            <hr class="hr bg-light">

                            <span class="d-block h2 mb-4">Informações de entrega</span>

                            @if (session()->has('success-message'))
                                <div class="alert alert-success mt-3" role="alert">
                                    {{ session()->get('success-message') }}
                                </div>
                            @endif

                            @if (session()->has('error-message'))
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{ session()->get('error-message') }}
                                </div>
                            @endif

                            @if (count($errors->all()) > 0)
                                <ul class="alert alert-danger mt-3">
                                    @foreach ($errors->all() as $error)
                                        <li class="ms-3">{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (count($enderecos) >= 1)
                                @php $hideForm = 'd-none' @endphp
                                @foreach ($enderecos as $endereco)
                                    <div class="d-flex align-items-center my-auto bg-light rounded p-3 mb-4">
                                        <div class="col-1">
                                            <input type="radio" id="{{$endereco->ENDERECO_NOME}}" class="form-check-input ms-3 me-4" name="endereco" value="{{$endereco->ENDERECO_ID}}">
                                        </div>
                                        <div class="col ms-4">
                                            <label for="{{$endereco->ENDERECO_NOME}}" class="form-check-label">
                                                <span class="d-block"><strong>{{strtoupper($endereco->ENDERECO_NOME)}}</strong></span>
                                                <span>{{$endereco->ENDERECO_LOGRADOURO}}, </span>
                                                <span>{{$endereco->ENDERECO_NUMERO}} - </span>
                                                <span><i>{{($endereco->ENDERECO_COMPLEMENTO) ? $endereco->ENDERECO_COMPLEMENTO." - " : ''}}</i></span>
                                                <span>{{$endereco->ENDERECO_CIDADE}} - </span>
                                                <span>{{$endereco->ENDERECO_ESTADO}}, </span>
                                                <span>{{$endereco->ENDERECO_CEP}}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="d-block mt-5">
                                    {!! $enderecos->links() !!}
                                </div>

                                <button type="button" id="drop_form" class="btn btn-light btn-lg rounded-pill my-4 shadow-sm enderecoNovo" value="show">Adicionar novo endereço</button>
                            @endif

                            <form action="{{ route('endereco.store') }}" method="post" class="{{$hideForm ?? ''}} row g-3 mb-5" id="form-endereco">
                                @csrf
                                <div class="col-12 col-sm-8 col-xxl-3">
                                    <input type="number" name="cep" id="cep" placeholder="CEP" value="{{old('cep')}}" class="@error('cep') is-invalid @enderror rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-4 col-xxl-2">
                                    <input type="number" name="numero" id="numero" placeholder="Nº" value="{{old('numero')}}" class="@error('numero') is-invalid @enderror rounded-pill form-control form-control-lg text-sm-center" autocomplete="off">
                                </div>
                                <div class="col-12 col-xxl-7">
                                    <input type="text" name="complemento" id="Complemento" placeholder="Complemento" value="{{old('complemento')}}" class="@error('complemento') is-invalid @enderror rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="logradouro" id="logradouro" placeholder="Endereço" value="{{old('logradouro')}}" class="@error('logradouro') is-invalid @enderror rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12 col-lg-5">
                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{old('bairro')}}" class="@error('bairro') is-invalid @enderror rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-8 col-lg-4">
                                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{old('cidade')}}" class="@error('cidade') is-invalid @enderror rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12 col-sm-4 col-lg-3">
                                    <input type="text" name="uf" id="uf" placeholder="UF" value="{{old('uf')}}" class="@error('uf') is-invalid @enderror rounded-pill form-control form-control-lg text-sm-center" autocomplete="off">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="text" name="rotulo" placeholder="Rótulo" class="@error('rotulo') is-invalid @enderror  rounded-pill form-control form-control-lg" autocomplete="off">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <button type="submit" class="btn btn-light btn-lg rounded-pill w-100 shadow-sm">Salvar endereço</button>
                                </div>
                            </form>

                            <span class="d-block fw-semibold my-4">Tempo de entrega de 1-3 dias úteis.</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            @foreach ($itens as $item)
                                <hr class="hr bg-light">

                                <div class="row row-cols-1 row-cols-md-3 py-2">
                                    <div class="col-7 col-sm-4 mx-auto mx-sm-0">
                                        <div class="overflow-hidden rounded-4 div mx-auto">
                                            <a href="{{route('produto.show', $item->produto->PRODUTO_ID)}}" class="link">
                                                @if (isset($item->produto->produtoImagens[0]))
                                                    <img src="{{$item->produto->produtoImagens[0]->IMAGEM_URL}}" alt="..." class="figure-img img-fluid">
                                                @else
                                                    <img src="https://via.placeholder.com/223X320/F8F8F8/CCC?text=Sem%20Imagem" alt="..." class="figure-img img-fluid">
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-7 col-sm-4 mx-auto text-center mt-4 mt-sm-0 fs-5">
                                        <div class="mb-3">
                                            <span class="fw-bold">Título: </span>
                                            <span class="d-block">{{ $item->produto->PRODUTO_NOME }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <span class="fw-bold">Categoria: </span>
                                            <span class="d-block">{{ $item->produto->produtoCategoria->CATEGORIA_NOME }}</span>
                                        </div>

                                        @if ($item->produto->PRODUTO_DESCONTO > 0)
                                            <div>
                                                <span class="d-block fs-5 fw-semibold">R$ {{number_format( $item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2)}}</span>
                                                <span class="d-block fs-5 ms-2"><sup>R$ <s>{{ $item->produto->PRODUTO_PRECO }}</s></sup></span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="d-block fs-5 fw-semibold">R$ {{$item->produto->PRODUTO_PRECO}}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-7 col-sm-4 mx-auto mt-4 mt-sm-0">
                                        <form class="d-flex justify-content-center" action="{{route('carrinho.store', $item->PRODUTO_ID)}}" method="post">
                                            @csrf
                                            <div class="d-flex justify-content-between justify-content-xl-center p-2 rounded-pill border border-1 border-dark">
                                                <button type="button" id="qtd-menos" class="btn btn-default btn btn-default border-0" onclick="atualizarQtd(this, -1)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                                    </svg>
                                                </button>
                                                <input type="number" id="produto-qtd" class="form-control w-auto text-center border-0 shadow-none" name="qtd" value="{{$item->ITEM_QTD}}" min="1" max="{{$item->produto->produtoEstoque->PRODUTO_QTD}}">
                                                <button type="button" id="qtd-mais" class="btn btn-default border-0" onclick="atualizarQtd(this, 1)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-11 order-first order-lg-0 mb-md-5 mb-lg-0 col-lg-4 col-xxl-4">
                    <div class="row">
                        <div class="col-12 mx-lg-0 bg-light rounded-top mb-2 p-4">
                            <span class="d-block fw-bold fs-5 mb-3">CUPOM DE DESCONTO</span>
                            <div class="row row-cols-2 align-items-center">
                                <div class="col-10">
                                    <form action="#" method="#">
                                        <input type="text" name="#" id="txt" class="form-control rounded-pill" placeholder="Digite seu cupom">
                                    </form>
                                </div>
                                <div class="col-2 bg-light rounded-top">
                                    <button type="button" class="btn btn-default p-0 border border-0 float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 bg-light rounded-bottom p-4">
                            <span class="fw-bold mb-3 h4 d-block">Detalhes do Pedido</span>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-normal fs-5 align-start">Preço total</span>
                                <span class="fw-normal fs-5">R$ {{number_format($precoTotal, 2)}}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-normal fs-5">Frete</span>
                                <span class="fw-normal fs-5">Grátis</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-normal fs-5">Desconto</span>
                                <span class="fw-normal fs-5">R$ {{number_format($descontoTotal, 2)}}</span>
                            </div>

                            <div class= "d-flex justify-content-between align-items-center py-4 border-1 border-top border-dark">
                                <span class="fw-bold fs-5">Valor total</span>
                                <span class="fw-semibold fs-5">R$ {{number_format($precoTotal - $descontoTotal, 2)}}</span>
                            </div>

                            <a href="{{route('checkout')}}" class="btn btn-dark text-white rounded-pill w-100 py-2 text-align-center" role="button">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

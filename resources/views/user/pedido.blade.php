@extends('layout')

@section('main')
    <div class="container-xxl mt-4">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link">Perfil</a></li>
                <li class="breadcrumb-item"><a href="{{route('pedidos')}}" class="link">Meus Pedidos</a></li>
                <li class="breadcrumb-item active">Pedido #{{$items[0]->PEDIDO_ID}}</li>
            </ul>
        </nav>
    </div>

    <main role="main" class="mb-5">
            <div class="container-xxl mb-5">
                <div class="row">
                    <span class="d-block fw-bold h4">Pedido #{{$items[0]->PEDIDO_ID}}</span>
                </div>

                <div class="row row-cols-2 mt-3 gx-5">
                    <div class="col-8">
                        @foreach ($items as $item)
                            <hr class="hr bg-light">

                            <div class="row py-2">
                                <div class="col-2">
                                    <img src="{{$item->pedidoItens->produtoImagens[0]->IMAGEM_URL}}" width="140" class="img-fluid rounded-4">
                                </div>

                                <div class="col-6 vstack justify-content-around">
                                    <div>
                                        <span class="fw-bold">Titulo: </span>
                                        <span>{{$item->pedidoItens->PRODUTO_NOME}}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">Categoria: </span>
                                        <span>{{$item->pedidoItens->produtoCategoria->CATEGORIA_NOME}}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">Quantidade: </span>
                                        <span>{{$item->ITEM_QTD}} unidade(s)</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">Preço Unitario: </span>
                                        <span>R$ {{number_format($item->ITEM_PRECO, 2)}}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">Valor Total do Item: </span>
                                        <span>R$ {{number_format($item->ITEM_PRECO * $item->ITEM_QTD, 2)}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-4">
                        <div class="d-block bg-light shadow-sm p-4">
                            <span class="d-block fw-bold">ENDEREÇO DE ENTREGA</span>
                            <span class="d-block fs-5 mt-3">Av. Eng. Eusébio Stevaux, 823 - Santo Amaro, São Paulo - SP, 04696-000</span>

                            <hr class="hr bg-dark my-4">

                            <div class="row row-cols-3 lh-lg">
                                <div class="col-12">
                                    <span class="d-block fw-bold">PREÇO DO PEDIDO</span>
                                </div>
                                <div class="col-6">
                                    <span class="d-block">PREÇO TOTAL</span>
                                    <span class="d-block">FRETE</span>
                                </div>
                                <div class="col-6 d-flex flex-column align-items-end fw-bold">
                                    <span class="d-block">R$ 159,98</span>
                                    <span class="d-block">Gratis</span>
                                </div>
                            </div>

                            <hr class="hr bg-dark my-4">

                            <div class="row row-cols-2 fw-bold">
                                <div class="col-6">
                                    <span class="d-block">VALOR TOTAL</span>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <span class="d-block">R$ 169,58</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection

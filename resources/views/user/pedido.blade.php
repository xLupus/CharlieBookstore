@extends('layout')

@section('main')
    <main role="main" class="mb-5">
            <div class="container-xxl mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="" class="link text-decoration-none text-dark">Perfil</a></li>
                                <li class="breadcrumb-item active"><a href="" class="link text-decoration-none text-dark">Meus Pedidos</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 mt-2">
                        <span class="d-block fw-bold fs-3">Pedido #9451</span>
                    </div>
                </div>

                <div class="row row-cols-2 mt-5 gx-5">
                    <div class="col-8">
                        <div class="row row-cols-3 fs-5 py-4">
                            <div class="col-2">
                                <img src="/PI/assets/header/book6.png" alt="...">
                            </div>
                            <div class="col-6 ps-5 lh-lg">
                                <span class="d-block fw-bold mb-3">O senhor dos Anéis: Os Anéis de Poder</span>
                                <span class="d-block"><b>Autor:</b> J. R. R. Tolkien</span>
                                <span class="d-block"><b>Ano:</b> 1954</span>
                                <span class="d-block"><b>Quantidade:</b> 01</span>
                            </div>
                            <div class="col-4">
                                <span class="d-flex justify-content-center fw-bold fs-3 pt-5">R$: 36,00</span>
                            </div>
                        </div>

                        <div class="row row-cols-3 fs-5 py-4">
                            <div class="col-2">
                                <img src="/PI/assets/header/book6.png" alt="...">
                            </div>
                            <div class="col-6 ps-5 lh-lg">
                                <span class="d-block fw-bold mb-3">O senhor dos Anéis: Os Anéis de Poder</span>
                                <span class="d-block"><b>Autor:</b> J. R. R. Tolkien</span>
                                <span class="d-block"><b>Ano:</b> 1954</span>
                                <span class="d-block"><b>Quantidade:</b> 01</span>
                            </div>
                            <div class="col-4">
                                <span class="d-flex justify-content-center fw-bold fs-3 pt-5">R$: 36,00</span>
                            </div>
                        </div>

                        <div class="row row-cols-3 fs-5 py-4">
                            <div class="col-2">
                                <img src="/PI/assets/header/book6.png" alt="...">
                            </div>
                            <div class="col-6 ps-5 lh-lg">
                                <span class="d-block fw-bold mb-3">O senhor dos Anéis: Os Anéis de Poder</span>
                                <span class="d-block"><b>Autor:</b> J. R. R. Tolkien</span>
                                <span class="d-block"><b>Ano:</b> 1954</span>
                                <span class="d-block"><b>Quantidade:</b> 01</span>
                            </div>
                            <div class="col-4">
                                <span class="d-flex justify-content-center fw-bold fs-3 pt-5">R$: 36,00</span>
                            </div>
                        </div>

                        <div class="row row-cols-3 fs-5 py-4">
                            <div class="col-2">
                                <img src="/PI/assets/header/book6.png" alt="...">
                            </div>
                            <div class="col-6 ps-5 lh-lg">
                                <span class="d-block fw-bold mb-3">O senhor dos Anéis: Os Anéis de Poder</span>
                                <span class="d-block"><b>Autor:</b> J. R. R. Tolkien</span>
                                <span class="d-block"><b>Ano:</b> 1954</span>
                                <span class="d-block"><b>Quantidade:</b> 01</span>
                            </div>
                            <div class="col-4">
                                <span class="d-flex justify-content-center fw-bold fs-3 pt-5">R$: 36,00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="d-block bg-light shadow-sm p-4">
                            <span class="d-block fw-bold">ENDEREÇO DE ENTREGA</span>
                            <span class="d-block fs-5 mt-3">
                                Av. Eng. Eusébio Stevaux, 823 - Santo Amaro, São Paulo - SP, 04696-000
                            </span>

                            <hr class="hr bg-dark my-4">

                            <div class="row row-cols-3 lh-lg">
                                <div class="col-12"><span class="d-block fw-bold">PREÇO DO PEDIDO</span></div>
                                <div class="col-6">
                                    <span class="d-block">PREÇO TOTAL</span>
                                    <span class="d-block">FRETE</span>
                                    <span class="d-block">DESCONTO</span>
                                </div>
                                <div class="col-6 d-flex flex-column align-items-end fw-bold">
                                    <span class="d-block">R$ 159,98</span>
                                    <span class="d-block">R$ 10,00</span>
                                    <span class="d-block">R$ 0,00</span>
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

@extends('layout')

@section('title', 'Verificação de Dados')
@section('main')

<div class="container-xxl mt-4">
    <nav aria-label="breadcrumb mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Carrinho</li>
            <li class="breadcrumb-item">Verificação de dados</li>
        </ol>
    </nav>
</div>

<main class="container-xxl">
    <div class="row row-cols-2">
        <div class="col col-8 mb-5">
            <div class="row mb-3">
                <h5 class="fw-bold py-4">Informações de contato</h5>
                <form>
                    <div class="d-flex mb-3">
                        <input type="text" class="form-control rounded-pill w-100 py-3 me-5" placeholder="Nome">
                        <input type="text" class="form-control rounded-pill w-100 py-3" placeholder="Sobrenome">
                    </div>

                    <div class="d-flex">
                        <input type="text" class="form-control rounded-pill w-100 py-3 me-5" placeholder="Email">
                        <input type="text" class="form-control rounded-pill w-100 py-3" placeholder="Telefone">
                    </div>
                </form>
            </div>

            <div class="row mb-3 ">
                <div>
                    <span class="fw-bold mt-3 h5 d-block">Endereço de entrega</span>
                    <span class="d-block my-3">Av. Eng. Eusébio Stevaux, 823 - Santo Amaro, São Paulo - SP, 04696-000</span>
                    <a href="" class="text-decoration-none text-secondary">Alterar endereço</a>
                </div>
            </div>

            <div class="row mb-5">
                <div>
                    <h5 class="fw-bold py-4">Forma de Pagamento</h5>

                    <div class="d-flex w-75 justify-content-between ">
                        <button class="btn btn-light rounded-pill bg-light py-3">Boleto Bancario</button>
                        <button class="btn btn-light rounded-pill bg-light py-3">Cartão de crédito</button>
                        <button class="btn btn-light rounded-pill bg-light py-3">Transferencia Bancaria</button>
                        <button class="btn btn-light rounded-pill bg-light py-3 px-4">PIX</button>
                    </div>
                  </div>
            </div>
        </div>

        <div class="col col-4">
            <div class="bg-light rounded mt-3 p-3">
                <span class="d-block fw-bold h4 mb-3">Detalhes do Pedido</span>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-normal fs-5 align-start">Preço total</span>
                        <span class="fw-normal fs-5">R$39,12</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-normal fs-5">Frete</span>
                        <span class="fw-normal fs-5">R$</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fw-normal fs-5">Desconto</span>
                        <span class="fw-normal fs-5">R$</span>
                    </div>
                    <div class= "d-flex justify-content-between align-items-center py-4 border-1 border-top border-dark">
                        <span class="fw-bold fs-5">Valor total</span>
                        <span class="fw-semibold fs-5">R$</span>
                    </div>
                <input type="button" value="Ir Para..." class="bg-black text-white rounded-pill w-100 py-2 text-align-center ">
            </div>
        </div>
    </div>
</main>
@endsection

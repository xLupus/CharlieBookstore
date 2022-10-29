@extends('layout')

@section('style', '/css/card-bootstrap.css')
@section('script', '/js/card.js')
@section('main')
    <main role="main">
            <div class="container-xxl mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="link text-decoration-none text-dark">Carrinho</a></li>
                                <li class="breadcrumb-item"><a href="" class="link text-decoration-none text-dark">Verificação de Dados</a></li>
                                <li class="breadcrumb-item active"><a href="" class="link text-decoration-none text-dark">Ordem de pagamento</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-12 mt-2">
                        <span class="d-block fs-3 fw-bold">Ordem de Pagamento</span>
                        <span class="d-block text-muted">Todas as transações são seguras e criptografadas</span>
                    </div>
                </div>

                <div class="row row-cols-2 mt-5">
                    <div class="col-7 mx-auto">
                        <div class="d-block credit-card-front">
                            <div class="row">
                                <div class="col-11 mx-auto d-flex justify-content-between mt-4">
                                    <span class="d-block text-white">
                                        <img src="/PI/assets/header/chip.png" alt="visa" width="70" class="img-fluid">
                                    </span>
                                    <span class="d-block text-white">
                                        <img src="/PI/assets/header/visa.png" alt="visa" width="65" class="img-fluid">
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-11 mx-auto mt-5">
                                    <span class="d-block text-white text-center credit-card-number">0000 0000 0000 0000</span>
                                </div>
                            </div>

                            <div class="row row-cols-2 fs-4 text-white">
                                <div class="col-11 mx-auto mt-3">
                                    <span class="d-block text-end"><small>Validade</small></span>
                                </div>
                            </div>

                            <div class="row row-cols-2 fs-4 text-white">
                                <div class="col-11 mx-auto d-flex justify-content-between mt-2">
                                    <span class="d-block text-uppercase" id="name">LOREM IPSUM</span>
                                    <div class="d-flex text-center card-val">
                                        <div class="d-block">00</div>
                                        <div class="d-block px-2">/</div>
                                        <div class="d-block">00</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-block credit-card-back">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-block credit-card-bar"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-11 mx-auto d-flex justify-content-end align-items-center">
                                    <span class="d-block text-white credit-card-cvv fs-5 pe-4">CVV</span>
                                    <span class="d-block text-dark text-center cvv-number">000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 mx-auto">
                        <form action="#" method="#">
                            <fieldset>
                                <legend class="fw-bold mb-5"><small>Cartão de crédito</small></legend>

                                <div class="row">
                                   <div class="col">
                                        <div class="position-relative mb-3">
                                            <input type="text" class="form-control form-control-lg rounded-pill" id="cardNumber" placeholder="Número do Cartão" maxlength="19" required>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lock position-absolute top-50 translate-middle-y" viewBox="0 0 16 16" style="right: 1em;">
                                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                            </svg>
                                        </div>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="cardName" placeholder="Nome do Titular do Cartão" aria-label="cardName" maxlength="16" required>
                                   </div>
                                </div>

                                <div class="row row-cols-3 mt-3">
                                    <div class="col">
                                        <select name="#" id="cardMonth" class="form-select form-select-lg rounded-pill" required>
                                            <option value="Mês" selected disabled>Mês</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select name="#" id="cardYear" class="form-select form-select-lg rounded-pill" required>
                                            <option value="Ano" selected disabled>Ano</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <div class="position-relative mb-3">
                                            <input type="text" class="form-control form-control-lg rounded-pill" id="cardCVV" placeholder="CCV" aria-label="cardCVV" maxlength="3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-question-circle position-absolute top-50 translate-middle-y" viewBox="0 0 16 16" style="right: 1em;">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="d-block fw-bold">TOTAL A PAGAR:</span>
                                        <span class="d-block fw-bold">R$ 159,98</span>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="d-block">
                                            <button type="submit" class="btn btn-outline-dark rounded-pill w-100 py-2">Pagar</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection

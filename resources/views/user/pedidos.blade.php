@extends('layout')

@section('main')
    <div class="container-xxl mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Perfil</li>
                <li class="breadcrumb-item active">Meus Pedidos</li>
            </ol>
        </nav>
    </div>

    <main class="container-xxl">
        <h1 class="h4 fw-bold">Meus Pedidos</h1>

        <div class="d-flex justify-content-center mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DATA DA COMPRA</th>
                        <th scope="col">METODO DE PAGAMENTO</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">N DE ITENS</th>
                        <th scope="col">TOTAL DA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pedidos = 0
                    @endphp
                    @if ($pedidos== 0 )
                        <tr>
                            <td colspan="6" class="text-center py-3">Você não possui nenhum pedido</td>
                        </tr>
                    @endif
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>

    </main>

@endsection

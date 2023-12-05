

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="@yield('style')">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="/js/tooltip.js" defer></script>
    <script src="@yield('script')" defer></script>
    <script src="@yield('filtro')" defer></script>
    <title>@yield('title')</title>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <header class="navbar navbar-expand-xl fixed-top bg-white">
        <nav class="container-xxl">
            <a href="{{route('home')}}" class="link text-decoration-none text-dark navbar-brand">
                <img src="/img/Logo.png" class="img-fluid">
            </a>

            <form action="{{route('search')}}" method="#" class="mx-auto d-none d-md-block d-xl-none w-50 mt-xl-0 position-relative" role="search">
                <input type="search" class="form-control form-control-lg" maxlength="100" name="search" value="{{$pesquisa ?? ''}}" placeholder="Pesquise por algo...">
                <button type="submit" class="btn btn-default p-0 border-0 position-absolute top-50 translate-middle-y" style="right: 1em">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>{{-- breakpoint médio apenas --}}

            {{-- OFF CANVAS --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffCanvas" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="navbarOffCanvas">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="close"></button>
                </div>

                <div class="offcanvas-body align-items-center">
                    <ul class="navbar-nav mx-xl-auto text-center d-none d-xl-block">
                        <li class="nav-item mb-1 mb-xl-0 pe-xl-1">
                            <a href="{{route('catalogo')}}" class="nav-link fw-semibold fs-5 d-none d-xl-block" aria-current="page">Catalogo</a>
                            <a href="{{route('catalogo')}}" class="nav-link fw-semibold fs-5 text-dark d-block d-xl-none" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mx-xl-auto d-flex flex-row d-xl-none justify-content-center align-items-center">
                        <li class="nav-item p-3 p-xl-3">
                            <a href="{{route('catalogo')}}" class="nav-link fw-semibold fs-5 text-dark d-block d-xl-none" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                            </a>
                        </li>

                        <li class="nav-item dropdown p-3 p-xl-3 position-relative d-block d-xl-none">
                            <a href="#" class="nav-link" data-bs-toggle="offcanvas" role="button" data-bs-target="#userOffCanvas" id="offcanvasBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </a>

                            @auth
                            <span class="position-absolute translate-middle rounded-circle bg-success user">
                                <span class="visually-hidden">Logado</span>
                            </span>
                            @endauth
                        </li>

                        <li class="nav-item p-3 p-xl-3 position-relative text-center">
                            @auth
                            @if (Carrinho::qtdCarrinho(Auth::user()->USUARIO_ID) > 0)
                            <a href="{{route('carrinho.index')}}" class="nav-link">
                                <span class="badge rounded-5 position-absolute end-0 bottom-50 translate-middle-x badge-itens">{{Carrinho::qtdCarrinho(Auth::user()->USUARIO_ID)}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @else
                            <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Sem itens no carrinho" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @endif
                            @endauth

                            @guest
                            <a href="{{route('carrinho.index')}}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @endguest
                        </li>
                    </ul>

                    <form action="{{ route('search') }}" method="#" class="mx-auto ms-xl-auto mx-xl-0 mt-4 mt-xl-0 mt-xl-0 d-none d-xl-block position-relative" role="search">
                        <input type="search" class="form-control form-control-lg" maxlength="100" name="search" value="{{$pesquisa ?? ''}}" placeholder="Pesquise por algo...">
                        <button type="submit" class="btn btn-default p-0 border-0 position-absolute top-50 translate-middle-y" style="right: 1em">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </form>

                    <hr class="hr">

                    <ul class="navbar-nav d-none d-xl-flex">
                        <li class="nav-item dropdown p-2 p-xl-3 position-relative d-none d-xl-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </a>

                            @auth
                            <span class="position-absolute translate-middle rounded-circle bg-success user">
                                <span class="visually-hidden">Logado</span>
                            </span>
                            @endauth

                            <ul class="dropdown-menu">
                                @auth
                                <li>
                                    <a href="#" class="dropdown-item disabled text-capitalize">Olá, {{Auth::user()->USUARIO_NOME}} !</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="{{route('pedidos')}}" class="dropdown-item">Meus Pedidos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{route('logout')}}" method="post" class="dropdown-item p-1 w-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-default border py-0 text-start w-100">Sair</button>
                                    </form>
                                </li>
                                @endauth

                                @guest
                                <li><a href="{{route('login')}}" class="dropdown-item">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="{{route('register')}}" class="dropdown-item">Cadastrar</a></li>
                                @endguest
                            </ul>
                        </li>{{-- Faz parte do não responsivo --}}

                        <li class="nav-item p-2 p-xl-3 position-relative text-center">
                            @auth
                            @if (Carrinho::qtdCarrinho(Auth::user()->USUARIO_ID) > 0)
                            <a href="{{route('carrinho.index')}}" class="nav-link">
                                <span class="badge rounded-5 position-absolute end-0 bottom-50 translate-middle-x badge-itens">{{Carrinho::qtdCarrinho(Auth::user()->USUARIO_ID)}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @else
                            <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Sem itens no carrinho" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @endif
                            @endauth

                            @guest
                            <a href="{{route('carrinho.index')}}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="dark" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                            @endguest
                        </li>
                    </ul>

                    <form action="{{ route('search') }}" method="#" class="mx-auto ms-xl-auto mx-xl-0 mt-4 mt-xl-0 mt-xl-0 d-block d-md-none position-relative" role="search">
                        <input type="search" class="form-control form-control-lg" maxlength="100" name="search" value="{{$pesquisa ?? ''}}" placeholder="Pesquise por algo...">
                        <button type="submit" class="btn btn-default p-0 border-0 position-absolute top-50 translate-middle-y" style="right: 1em">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="offcanvas offcanvas-end d-xl-none" tabindex="-1" id="userOffCanvas" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-center">
                    <ul class="list-group list-group-flush">
                        @auth
                        <a href="#" class="list-group-item list-group-action disabled text-capitalize">Olá, {{Auth::user()->USUARIO_NOME}} !</a>
                        <a href="{{route('pedidos')}}" class="list-group-item list-group-action">Meus Pedidos</a>
                        <li class="list-group-item">
                            <form action="{{route('logout')}}" method="post" class="p-1 w-100">
                                @csrf
                                <button type="submit" class="btn btn-default border border-0 py-0">Sair</button>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <a href="{{route('login')}}" class="list-group-item list-group-action">Login</a>
                        <a href="{{route('register')}}" class="list-group-item list-group-action">Cadastrar</a>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                @yield('message')
            </div>
        </div>
    </div>

    <footer>
        @if (Route::currentRouteName() == 'home')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 footerImg">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col-12 col-md-4">
                            <img src="/img/footerImg.png" alt="Foto do livro Mayah-Lavander" class="img-fluid">
                        </div>
                        <div class="col-12 vstack col-md-8 my-md-auto my-5 text-white text-center text-md-start">
                            <span class="fs-6 fw-bold text-dark ms-md-5">NOVO LANÇAMENTO</span>
                            <span class="display-3 ms-md-5 mt-4">Mayah - Lavender</span>
                            <div class="mt-5 ms-md-5">
                                <a href="https://www.instagram.com/mayah_br/" class="btn btn-outline-light rounded-pill fw-bold reservar">RESERVAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="container-xxl">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 pt-4 pb-2 px-0 gy-3 gy-xl-0">
                <div class="col d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="currentColor" class="bi bi-truck rounded-circle bg-white p-2" viewBox="-1.5 -1 18 18">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                    <span class="text-white fw-semibold ms-3 opcoes">Entrega Rápida</span>
                </div>
                <div class="col d-flex justify-content-center justify-content-sm-start justify-content-xl-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="currentColor" class="bi bi-arrow-counterclockwise rounded-circle bg-white p-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                    </svg>
                    <span class="text-white fw-semibold ms-3 opcoes">Reembolso em 24hrs</span>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="currentColor" class="bi bi-telephone rounded-circle bg-white p-2" viewBox="-1.2 -1.7 17.3 20">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    <span class="text-white fw-semibold ms-3 opcoes">+55 (11) 7521-1231</span>
                </div>
                <div class="col d-flex justify-content-center justify-content-sm-start justify-content-xl-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="currentColor" class="bi bi-envelope rounded-circle bg-white p-2" viewBox="-0.7 -2 17 20">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                    <span class="text-white fw-semibold ms-3 opcoes">CharlieBS@gmail.com</span>
                </div>
            </div>
        </div>

        <hr class="hr py-1">

        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-md-3 mt-4">
                <div class="col d-flex d-md-block flex-column align-items-center justify-content-center my-5 my-md-1">
                    <span class="text-white fw-bold fs-5 d-block mb-4">Navegue Por Aqui:</span>
                    <a href="{{route('catalogo')}}" class="link text-white">Catalogo</a>
                </div>

                <div class="col d-flex flex-column align-items-center justify-content-center my-5 my-md-1">
                    <span class="text-white fw-bold fs-5">Confira Nossas Redes:</span>

                    <ul class="list-group list-group-horizontal border border-0 ms-0 mt-4">
                        <li class="list-group-item bg-transparent border border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-facebook text-white" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </li>
                        <li class="list-group-item bg-transparent border border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-youtube text-white" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                        </li>
                        <li class="list-group-item bg-transparent border border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-instagram text-white" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                        </li>
                        <li class="list-group-item bg-transparent border border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-twitter text-white" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </li>
                        <li class="list-group-item bg-transparent border border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-tiktok text-white" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                            </svg>
                        </li>
                    </ul>
                </div>
                <div class="col d-flex flex-column align-items-center align-items-md-end justify-content-center my-5 my-md-1">
                    <span class="text-white fw-bold fs-5 d-block mb-4">Meu Perfil:</span>
                    @guest
                    <a href="{{route('login')}}" class="link text-white d-block">ENTRAR</a>
                    <a href="{{route('register')}}" class="link text-white d-block pt-2">CADASTRAR</a>
                    @endguest

                    @auth
                    <a href="{{route('pedidos')}}" class="link text-white d-block pb-1">MEUS PEDIDOS</a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link text-white d-block p-0">SAIR</button>
                    </form>
                    @endauth
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <span class="d-block text-center text-white py-3">©2022 Charlie BookStore - All Rights Reserved</span>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
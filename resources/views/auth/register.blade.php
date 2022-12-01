<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="/css/styles.css">
            <link rel="stylesheet" href="/css/style.css">
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-xl-2 mb-4 mb-sm-0">
                <div class="col-xl-5 d-none d-xl-block">
                    <img src="/img/cadastro.png" alt="Imagem da tela de login" class="img-fluid position-relative cadastro-background">
                </div>

                <div class="col-11 col-xl-7 mx-auto mt-4">
                    <div class="row">
                        <div class="col-10 mx-auto d-flex flex-column align-items-center">
                            <a href="{{route('home')}}" class="link">
                                <img src="/img/Logo.png" alt="Charlie-Bookstore Logo" class="img-fluid logo">
                            </a>

                            <span class="d-flex mt-3">Comece a sua jornada.</span>
                            <span class="h2 fw-bold mb-4 mt-2">Faça seu cadastro</span>
                        </div>
                    </div>

                    <form action="{{route('register')}}" method="post" class="row">
                        @csrf
                        <div class="col-9 col-xl-6 mx-auto d-flex flex-column gap-2">
                            {{-- Nome --}}
                            <label class="form-label mb-2" for="NomeCompleto">Nome Completo</label>
                            <input type="text" name="nome" value="{{old('nome')}}" class="form-control form-control-lg text-form @error('nome') is-invalid @enderror">

                            @if(!count($errors->get('nome')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('nome')[0]}}</span>
                            @endif

                            {{--  Email --}}
                            <label class="form-label mb-2" for="Email">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg text-form @error('email') is-invalid @enderror" autocomplete="off">

                            @if(!count($errors->get('email')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('email')[0]}}</span>
                            @endif

                            {{-- Senha --}}
                            <label class="form-label mb-2" for="Senha">Senha:</label>
                            <input type="password" name="senha" class="form-control form-control-lg text-form @error('senha') is-invalid @enderror">

                            @if(!count($errors->get('senha')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('senha')[0]}}</span>
                            @endif

                            {{-- CPF--}}
                            <label class="form-label mb-2" for="Cpf">CPF:</label>
                            <input type="text" name="cpf" value="{{old('cpf')}}" class="form-control form-control-lg text-form @error('cpf') is-invalid @enderror">

                            @if(!count($errors->get('cpf')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('cpf')[0]}}</span>
                            @endif

                            <div class="vstack gap-3 mt-3 mt-sm-4">
                                <button type="submit" class="btn btn-default text-white py-3 cadastrar">Cadastrar</button>

                                <div class="d-flex align-items-center">
                                    <hr class="hr w-50">
                                    <span class="mx-5">ou</span>
                                    <hr class="hr w-50">
                                </div>
                                <a href="{{route('login')}}" class="btn btn-link text-decoration-none text-white py-3 logar" role="button">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>

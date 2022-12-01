<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="/css/styles.css">
            <link rel="stylesheet" href="/css/style.css">
        <title>Login</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-xl-2 mb-4 mb-sm-0">
                <div class="col-xl-5 d-none d-xl-block">
                    <img src="/img/login.png" alt="Imagem da tela de login" class="img-fluid login-background position-relative">
                </div>

                <div class="col-11 col-xl-7 mx-auto mt-4 mt-sm-5">
                    <div class="row">
                        <div class="col-10 mx-auto d-flex flex-column align-items-center">
                            <a href="{{route('home')}}" class="link">
                                <img src="/img/Logo.png" alt="Charlie-Bookstore Logo" class="img-fluid logo">
                            </a>

                            <span class="d-flex mt-3 mt-3">Bem-vindo de volta!</span>
                            <span class="h2 fw-bold mb-4 mt-2">Acesse sua conta</span>
                        </div>
                    </div>

                    <form action="{{ route('login') }}" method="post" class="row">
                        @csrf
                        <div class="col-9 col-xl-6 mx-auto d-flex flex-column gap-2">
                            {{-- Email --}}
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="Email" class="form-control form-control-lg text-form @error('email') is-invalid @enderror" autocomplete="off">

                            @if (!count($errors->get('email')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('email')[0]}}</span>{{-- retorna no indice 0 --}}
                            @endif

                            {{-- Senha --}}
                            <label for="Password" class="form-label">Senha</label>
                            <input type="password" name="password" id="Password" class="form-control form-control-lg text-form @error('password') is-invalid @enderror">

                            @if (!count($errors->get('password')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('password')[0]}}</span>{{-- retorna no indice 0 --}}
                            @endif

                            {{-- Erros --}}
                            @if (!count($errors->get('invalid')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('invalid')[0]}}</span>{{-- retorna no indice 0 --}}
                            @endif

                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mt-sm-2">
                                <div class="form-check mt-3 mt-sm-0">
                                    <input type="checkbox" name="#" id="check" class="form-check-input">
                                    <label for="check" class="form-check-label">Lembrar-me</label>
                                </div>
                                <a href="#" class="link text-decoration-none bg-none mt-3 mt-sm-0">Esqueceu sua senha ?</a>
                            </div>

                            <div class="vstack gap-3 mt-3 mt-sm-5">
                                <button type="submit" name="btn_entrar" class="btn btn-default text-white py-3 logar">Login</button>
                                <div class="d-flex align-items-center">
                                    <hr class="hr w-50">
                                    <span class="mx-5">ou</span>
                                    <hr class="hr w-50">
                                </div>
                                <a href="{{route('register')}}" class="btn btn-link text-decoration-none text-white py-3 cadastrar" role="button">Cadastre-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

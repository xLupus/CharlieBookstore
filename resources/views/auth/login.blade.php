<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="/css/styles.css">
        <title>Login</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row row-cols-2">

                <div class="col-6 login-background"></div>

                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="w-100 d-flex flex-column align-items-center">
                        <div class="logo d-block mb-5">
                            <a href="{{route('home')}}" class="link">
                                <img src="/img/Logo.png" alt="Charlie-Bookstore Logo" width="250" class="img-fluid">
                            </a>
                        </div>

                        <span class="">Bem vindo de volta!</span>
                        <span class="h2 fw-bold mb-5">Acesse sua conta</span>

                        <form class="w-50 d-flex flex-column" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="Email" class="form-label mb-2">Email</label>
                                <input type="email" name="email" id="Email" class="form-control form-control-lg text-form">

                                @if (!count($errors->get('email')) == 0)
                                    <span class="text-danger fw-bold fs-6">{{$errors->get('email')[0]}}</span>{{-- retorna no indice 0 --}}
                                @endif
                            </div>

                            <div class="mb-2">
                                <label for="Password" class="form-label mb-2">Senha</label>
                                <input type="password" name="password" id="Password" class="form-control form-control-lg text-form">
                            </div>

                            <button type="submit" name="btn_entrar" class="btn btn-primary my-3 py-3">{{ __('Log in') }}</button>
                        </form>

                        <a href="{{route('register')}}" class="link w-50">
                            <button type="button" class="btn btn-secondary w-100 py-3">Cadastrar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

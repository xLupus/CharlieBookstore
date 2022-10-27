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
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row row-cols-2">

                <div class="col cadastro-background"></div>

                <div class="col d-flex justify-content-center align-items-center">
                    <div class="w-100 d-flex flex-column align-items-center">
                        <div class="logo d-block mb-5">
                            <a href="{{route('home')}}">
                                <img class="logo" src="img/logo.png" alt="logo" width="250">
                            </a>
                        </div>

                        <span class="">Comece a sua jornada.</span>
                        <span class="h2 fw-bold mb-5">Faça seu cadastro</span>


                        <form action="{{route('register')}}" method="POST" class="w-50 d-flex flex-column">
                            @csrf

                            <div class="mb-2">
                                <label class="form-label mb-2" for="NomeCompleto">Nome Completo:</label>
                                <input type="text" class="form-control form-control-lg text-form" name="nome">
                                @if(!count($errors->get('nome')) == 0)
                                    <span class="text-danger fw-bold fs-6">{{$errors->get('nome')[0]}}</span>
                                @endif
                            </div>

                            <div class="mb-2">
                                <label class="form-label mb-2" for="Email">Email:</label>
                                <input type="email" class="form-control form-control-lg text-form" name="email">
                                @if(!count($errors->get('email')) == 0)
                                    <span class="text-danger fw-bold fs-6">{{$errors->get('email')[0]}}</span>
                                @endif
                            </div>

                            <div class="mb-2">
                                <label class="form-label mb-2" for="Senha">Senha:</label>
                                <input type="password" class="form-control form-control-lg text-form" name="senha">
                                @if(!count($errors->get('senha')) == 0)
                                    <span class="text-danger fw-bold fs-6">{{$errors->get('senha')[0]}}</span>
                                @endif
                            </div>

                            <div class="mb-2">
                                <label class="form-label mb-2" for="Cpf">CPF:</label>
                                <input type="text" class="form-control form-control-lg text-form" name="cpf">
                                @if(!count($errors->get('cpf')) == 0)
                                    <span class="text-danger fw-bold fs-6">{{$errors->get('cpf')[0]}}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary my-3 py-3"> {{ __('Registrar') }}</button>
                        </form>

                        <a href="#" class="link w-50">
                            <button class="btn btn-secondary w-100 py-3">Voltar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>

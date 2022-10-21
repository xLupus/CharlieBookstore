<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/cadastro.css">
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <img class="imagem-lateral" src="/img/cadastro.png" alt="imagem-lateral">
                </div>

                <div class="col">
                    <div class="d-flex justify-content-center">
                        <img class="logo" src="img/logo.png" alt="logo">
                    </div>

                    <div class="title">
                        <div class="d-flex justify-content-start zerar">
                            <p>Comece a sua jornada.</p>
                        </div>
                        <div class="d-flex justify-content-start zerar">
                            <h1>Faça seu cadastro</h1>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <form action="{{route('register')}}" method="POST" class="form-estilo">
                            @csrf
                            <label class="form-label" for="NomeCompleto">Nome Completo:</label>
                            <input type="text" class="form-control form-tamanho" name="USUARIO_NOME">
                            @if(!count($errors->get('USUARIO_NOME')) == 0)
                                <span class="text-danger fw-bold fs-6">{{$errors->get('USUARIO_NOME')[0]}}</span>
                            @endif
                            <label class="form-label"  for="Email">Email:</label>
                            <input type="email" class="form-control  form-tamanho" name="USUARIO_EMAIL">

                            <label class="form-label"  for="Senha">Senha:</label>
                            <input type="password" class="form-control  form-tamanho" name="USUARIO_SENHA">

                            <label class="form-label" for="Cpf">CPF:</label>
                            <input type="number" class="form-control  form-tamanho" name="USUARIO_CPF">

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="color shadow p-3"> {{ __('Registrar') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="#"><button class="color2 shadow p-3">Voltar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>

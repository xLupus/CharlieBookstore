<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @if (Auth::user())
        <p> Olá!
            {{ Auth::user()->USUARIO_NOME }}{{-- pega nome do usuario logado --}}
        </p>
        @else
            {{'Faça Login'}}
        @endif

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit"></button>
    </form>
</body>
</html>

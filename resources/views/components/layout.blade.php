<!doctype html>
<html lang="pt-BR">

<head>

    @vite(['resources/css/app.scss'])

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Séries</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>

        <a href="{{route('logout')}}">Sair</a>
    </div>
</nav>
<div class="container">
    <h1>{{ $title }}</h1>

    @isset($successMessage)
        <div class="alert alert-success mt-2">
            {{ $successMessage }}
        </div>
    @endisset

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{ $slot }}

</div>
</body>

</html>

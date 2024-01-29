<!doctype html>
<html lang="pt-BR">

<head>

    @vite(['resources/css/style.scss'])

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Séries</title>

    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        @endauth

        @guest
            <a href="{{route('login')}}">Entrar</a>
        @endguest
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

<x-layout title="Login">
    <form action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>

        <div class="form-group mt-3">
            <label for="password" class="form-label">Senha</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <button class="btn-primary btn mt-3" type="submit">Entrar</button>

        <a href="{{route('register')}}" class="btn btn-secondary mt-3">Registrar</a>

    </form>


</x-layout>

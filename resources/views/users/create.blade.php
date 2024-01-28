<x-layout title="Registrar">
    <form action="{{route('register')}}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name" class="form-label">Nome</label>
            <input class="form-control" type="name" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>

        <div class="form-group mt-3">
            <label for="password" class="form-label">Senha</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <button class="btn-primary btn mt-3" type="submit">Registrar</button>


    </form>

</x-layout>

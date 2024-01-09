<x-layout title="Nova Série">
    <form action="/series/store" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</x-layout>

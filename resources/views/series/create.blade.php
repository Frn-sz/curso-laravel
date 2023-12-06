<x-layout title="Nova Série">
    <form action="/series/save" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" id="nome" name="nome">
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</x-layout>

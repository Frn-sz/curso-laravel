<x-layout title="Editae Série">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ $serie->name }}">
        </div>
        <button class="btn btn-primary" type="submit">Editar</button>
    </form>
</x-layout>

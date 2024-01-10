<x-layout title="Editar Série {!! $serie->name !!}">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
        @csrf
        @method('PUT')



        <div class="mb-3">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ $serie->name }}">
        </div>


        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</x-layout>

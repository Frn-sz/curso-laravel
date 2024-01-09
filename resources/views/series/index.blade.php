<x-layout title="Séries">
    <a href="{{ route('series.create') }}">Adicionar</a>

    @isset($success_message)
        <div class="alert alert-success mt-2">
            {{ $success_message }}
        </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->name }}

                <span class='d-flex'>
                    <a href="{{ route('series.edit', $serie->id) }}" class = "btn btn-primary">E</a>


                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="mx-2">
                        @csrf
                        @method('DELETE')
                        <button class ="btn btn-danger">X</button>

                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>

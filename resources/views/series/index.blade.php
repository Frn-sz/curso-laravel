<x-layout title="Séries">

    @auth
        <a href="{{ route('series.create') }}">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                @auth
                    <a href="{{ route('seasons.index', $serie->id) }}">
                        @endauth
                        {{ $serie->name }}
                        @auth </a>
                @endauth
                <span class='d-flex'>

                    @auth
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary">E</a>
                    
                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="mx-2">
                        @csrf
                            @method('DELETE')
                        <button class="btn btn-danger">X</button>

                    </form>
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>

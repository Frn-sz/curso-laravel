<x-layout title="Séries">

    @auth
        <a href="{{ route('series.create') }}">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    @if($serie->cover)
                        <img src="{{asset('storage/' . $serie->cover)}}" class="img-thumbnail me-3"
                             style="height: 100px">
                    @else
                        <img src="{{asset('storage/default/default_series_cover.avif')}}" class="img-thumbnail me-3"
                             style="height: 100px">
                    @endif
                    @auth
                        <a href="{{ route('seasons.index', $serie->id) }}">
                            @endauth
                            {{ $serie->name }}
                            @auth </a>
                    @endauth
                </div>
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

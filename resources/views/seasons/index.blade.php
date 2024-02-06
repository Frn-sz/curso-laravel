<x-layout title="Temporadas de {!! $series->name !!}">
    <div style="display: flex;justify-content: center" class="mb-5">
        <img src="{{asset('storage/' . $series->cover)}}" class="img-fluid" style="height: 400px">
    </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    {{ $season->number }}
                </a>
                <span class='badge bg-secondary'>
                    {{ $season->numberOfWatchedEpisodes() }} /
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>

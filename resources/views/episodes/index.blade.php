<x-layout title="Episódios" :success-message="$success_message">

    <form action="{{ route('episodes.update', $season->id) }}" method="POST">
        @csrf
        @isset($successMessage)
            <div class="alert alert-success mt-2">
                {{ $successMessage }}
            </div>
        @endisset
        <ul class="list-group">
            @foreach ($season->episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $episode->number }}

                    <input type="checkbox" @if ($episode->watched) checked @endif name="episodes[]"
                           value="{{ $episode->id }}">
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary">Salvar</button>

    </form>

</x-layout>

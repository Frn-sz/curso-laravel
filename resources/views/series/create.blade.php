<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label" for="name">Nome:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                        autofocus>
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label" for="seasons_qnt">Temporadas:</label>
                    <input class="form-control" type="text" id="seasons_qnt" name="seasons_qnt"
                        value="{{ old('seasons_qnt') }}">
                </div>
            </div>

            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label" for="episodes_per_season">Episódios p/ temporada</label>
                    <input class="form-control" type="text" id="episodes_per_season" name="episodes_per_season"
                        value="{{ old('episodes_per_season') }}">
                </div>
            </div>

        </div>

        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
    {{-- <x-series.form :action="route('series.store')" name="{{ old('name') }} " :update="false"></x-series.form> --}}
</x-layout>

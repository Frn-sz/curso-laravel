    <form action="{{ $action }}" method="POST">
        @csrf

        @isset($name)
            @method('PUT')
        @endisset


        <div class="mb-3">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name"
                @isset($name)
                value="{{ $name }}"
                @endisset>
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>

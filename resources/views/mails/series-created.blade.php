<x-mail::message>

    # A série {{$serieName}} criada

    A série {{$serieName}} possui {{$seasons}} temporadas com {{$episodes}} episódios cada

<x-mail::button url="{{route('seasons.index',$serieId)}}">
        View Order
</x-mail::button>

</x-mail::message>

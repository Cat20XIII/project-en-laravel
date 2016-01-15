@extends("layout-test")

@section("content")

        {{ dump($superTeam) }}

    @foreach ($superTeam as $dc)

        @if ($dc['chef'] === true)
            <p>{{ $dc['firstname'] }} {{ $dc['lastname'] }} est le chef.</p>
        @endif

        <p>Voici notre Statuts :{{ strtoupper($dc['statut']) }} </p>
    @endforeach

        <p>On est {{ count($dc) }} dans l'equipe</p>
        <a href="{{route}}"></a>


@endsection

@extends('layouts.main')
@section('content')

@if ($autori_view == 'crea')
    <br><br><a href="{{ route('autore.create') }}">Inserisci un nuovo autore</a><br><br>
@endif

<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Cognome</th>
                <th>Nome</th>
                <th>Pseudonimo</th>
                @if ($autori_view == 'crea')
                    <th>Modifica</th>
                    <th>Elimina</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($autore AS $autori)
                <tr>
                    <td>{{ $autori->cognome }}</td>
                    <td>{{ $autori->nome }}</td>
                    <td>{{ $autori->pseudonimo }}</td>
                    @if ($autori_view == 'crea')
                        <td><a href="{{ route('autore.edit', $autori->id) }}">modifica</a></td>
                        <td><a href="{{ route('autore.elimina_form', $autori->id) }}">elimina</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($autori_view == 'crea')
        {{ $autore->links() }}
    @else
        {{ $autore->appends(['cerca_in' => $cerca_in, 'cerca_per' => $cerca_per, 'ricerca' => $search, 'esatta' => $ricerca_esatta])->links() }}
    @endif
</div>
@endsection
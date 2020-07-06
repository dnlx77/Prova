@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('titolo.create') }}">Inserisci un nuovo titolo</a><br><br>

<table>
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Trama</th>
            <th>Data lettura</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($titolo AS $titoli)
            <tr>
                <td>{{ $titoli->nome }}</td>
                <td>{{ $titoli->trama }}</td>
                <td>{{ $titoli->data_lettura }}
                <td><a href="{{ route('titolo.edit', $titoli->id) }}">modifica</a></td>
                <td>{{ $titoli->created_at }}</td>
                <td>{{ $titoli->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
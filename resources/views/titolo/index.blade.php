@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('titolo.create') }}">Inserisci un nuovo titolo</a><br><br>

<form action="{{ route('titolo.index') }}">
    <input class="form-control" placeholder="cerca" type="search" name="scope_search" value="{{ $scope_search }}">
    <button type="submit" class="btn btn-primary">Cerca</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Trama</th>
            <th>Data lettura</th>
            <th>Modifica</th>
            <th>Autori</th>
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
                <td><a href="{{ route('titolo.autore', $titoli->id) }}">autori</a></td>
                <td>{{ $titoli->created_at }}</td>
                <td>{{ $titoli->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
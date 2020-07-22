@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('autore.create') }}">Inserisci un nuovo autore</a><br><br>

<table>
    <thead>
        <tr>
            <th>Cognome</th>
            <th>Nome</th>
            <th>Modifica</th>
            <th>Elimina</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($autore AS $autori)
            <tr>
                <td>{{ $autori->cognome }}</td>
                <td>{{ $autori->nome }}</td>
                <td><a href="{{ route('autore.edit', $autori->id) }}">modifica</a></td>
                <td><a href="{{ route('autore.elimina_form', $autori->id) }}">elimina</a></td>
                <td>{{ $autori->created_at }}</td>
                <td>{{ $autori->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
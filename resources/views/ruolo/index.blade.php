@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('ruolo.create') }}">Definisci un nuovo ruolo</a><br><br>

<table>
    <thead>
        <tr>
            <th>Ruolo</th>
            <th>Modifica</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ruoli AS $ruolo)
            <tr>
                <td>{{ $ruolo->descrizione }}</td>
                <td>{{ $ruolo->created_at }}</td>
                <td>{{ $ruolo->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
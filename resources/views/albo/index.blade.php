@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('albo.create') }}">Inserisci un nuovo albo</a><br><br>

<table>
    <thead>
        <tr>
            <th>Numero di pagine</th>
            <th>Prezzo</th>
            <th>Codice a barre</th>
            <th>Modifica</th>
            <th>Elimina</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albi AS $albi)
            <tr>
                <td>{{ $albi->num_pagine }}</td>
                <td>{{ $albi->prezzo }}</td>
                <td>{{ $albi->barcode}}</td>
                <td><a href="{{ route('albo.edit', $albi->id) }}">modifica</a></td>
                <td><a href="{{ route('collana.elimina_form', $albi->id) }}">elimina</a></td>
                <td>{{ $albi->created_at }}</td>
                <td>{{ $albi->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
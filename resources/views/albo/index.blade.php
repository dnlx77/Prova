@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('albo.create') }}">Inserisci un nuovo albo</a><br><br>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Copertina</th>
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
                <td>
                    <div class="card" style="width: 18rem;">
                    <img src="{{ url('storage/'.$albi->filename) }}" class="card-img-top" alt="{{ $albi->filename }}">
                        <div class="card-body">
                          <p class="card-text">{{ $albi->original_filename }}</p>
                        </div>
                      </div>
                </td>
                <td>{{ $albi->num_pagine }}</td>
                <td>{{ $albi->prezzo }}</td>
                <td>{{ $albi->barcode}}</td>
                <td><a href="{{ route('albo.edit', $albi->id) }}">modifica</a></td>
                <td><a href="{{ route('albo.elimina_form', $albi->id) }}">elimina</a></td>
                <td>{{ $albi->created_at }}</td>
                <td>{{ $albi->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
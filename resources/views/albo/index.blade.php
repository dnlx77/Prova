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
            <th>Numero albo</th>
            <th>Titolo</th>
            <th>Editore</th>
            <th>Data di pubblicazione</th>
            <th>Collana</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albi AS $albo)
            <tr>
                <td>
                    <div class="card" style="width: 18rem;">
                    <img src="{{ url('storage/'.$albo->filename) }}" class="card-img-top" alt="{{ $albo->filename }}">
                        <div class="card-body">
                          <p class="card-text">{{ $albo->original_filename }}</p>
                        </div>
                      </div>
                </td>
                <td>{{ $albo->num_pagine }}</td>
                <td>{{ $albo->prezzo }}</td>
                <td>{{ $albo->barcode }}</td>
                <td>{{ $albo->numero }}</td>
                <td>{{ $albo->titolo }}</td>
                <td>{{ $albo->editore->nome }} </td>
                <td>{{ $albo->data_pubblicazione }}</td>
                <td>{{ $albo->collana['nome'] }}</td>
                <td><a href="{{ route('albo.edit', $albo->id) }}">modifica</a></td>
                <td><a href="{{ route('albo.elimina_form', $albo->id) }}">elimina</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
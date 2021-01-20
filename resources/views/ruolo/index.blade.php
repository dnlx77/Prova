@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('ruolo.create') }}">Definisci un nuovo ruolo</a><br><br>
<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Ruolo</th>
                <th>Modifica</th>
                <th>Elimina</th>
                <th>Data inserimento</th>
                <th>Data aggiornamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruoli AS $ruolo)
                <tr>
                    <td>{{ $ruolo->descrizione }}</td>
                    <td><a href="{{ route('ruolo.edit', $ruolo->id) }}">modifica</a></td>
                    <td><a href="{{ route('ruolo.elimina_form', $ruolo->id) }}">elimina</a></td>
                    <td>{{ $ruolo->created_at }}</td>
                    <td>{{ $ruolo->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
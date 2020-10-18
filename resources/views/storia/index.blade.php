@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('storia.create') }}">Inserisci una nuova storia</a><br><br>

<form action="{{ route('storia.index') }}">
    <input class="form-control" placeholder="cerca" type="search" name="scope_search" value="{{ $scope_search }}">
    <button type="submit" class="btn btn-primary">Cerca</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Trama</th>
            <th>Data lettura</th>
            <th>Stato storia</th>
            <th>Modifica</th>
            <th>Autori</th>
            <th>Elimina</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storia AS $storie)
            <tr>
                <td>{{ $storie->nome }}</td>
                <td>{{ $storie->trama }}</td>
                <td>{{ $storie->data_lettura }}                   
                <td>{{ \App\Enums\TipoStoriaEnum::getDescription($storie->stato) }}</td>
                <td><a href="{{ route('storia.edit', $storie->id) }}">modifica</a></td>
                <td><a href="{{ route('storia.autore', $storie->id) }}">autori</a></td>
                <td><a href="{{ route('storia.elimina_form', $storie->id) }}">elimina</a></td>
                <td>{{ $storie->created_at }}</td>
                <td>{{ $storie->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
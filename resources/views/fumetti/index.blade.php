@extends('layouts.main')
@section('content')
<a href="{{ route('fumetti.create') }}">Aggiungi nuovo fumetto</a>

<form action="{{ route('fumetti.index') }}">
    <input class="form-control" placeholder="cerca" type="search" name="scope_search" value="{{ $scope_search }}">
    <button type="submit" class="btn btn-primary">Cerca</button>
</form>

<table>
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Modifica</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fumetti AS $fumetto)
            <tr>
                <td>{{ $fumetto->titolo }}</td>
                <td><a href="{{ route('fumetti.edit', $fumetto->id) }}">modifica</a></td>
                <td>{{ $fumetto->created_at }}</td>
                <td>{{ $fumetto->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.main')
@section('content')
<table>
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fumetti AS $fumetto)
            <tr>
                <td><a href="fumetti/{{$fumetto->id}}/edit">{{ $fumetto->titolo}}</a></td>
                <td>{{ $fumetto->created_at}}</td>
                <td>{{ $fumetto->updated_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
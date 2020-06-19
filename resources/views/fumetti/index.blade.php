@extends('layouts.main')
@section('content')
<table>
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fumetti AS $fumetto)
            <tr>
                <td>{{ $fumetto->titolo}}</td>
                <td>{{ $fumetto->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.main')
@section('content')

<table>
    <thead>
        <tr>
            <th>Titoli</th>
            <th>Autori</th>
            <th>Ruoli</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $id_titolo }}</td><td>
                    @foreach ($autore AS $autori) 
                        <table><tr><td>{{ $autori }}</td><td>
                            @foreach ($ruolo AS $ruoli)
                                <table><tr><td>{{ $ruoli }}</td></tr></table>
                             @endforeach
                        </td></tr></table>
                    @endforeach
                </td>
            </tr>
    </tbody>
</table>
@endsection
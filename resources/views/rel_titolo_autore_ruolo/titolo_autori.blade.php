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
        @foreach ($info_autori AS $autori=>$ruolo)
            @foreach ($ruolo AS $ruoli)
                <tr>
                    <td>{{ $titolo }}</td>
                    <td>{{ $autori }}</td>
                    <td>{{ $ruoli }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection
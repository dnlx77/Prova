@extends('layouts.main')
@section('content')
<a href="{{ route('albo.aggiungi_storia', $albo->id) }}">Aggiungi storia</a> all'albo {{ $albo->titolo }}<br/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Titoli</th>
            <th>Elimina</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($storie AS $storia)
        <tr>
            <td>{{ $storia->nome }}</td>
            <td><a href="{{ route('albo.elimina_storia_form', [$albo->id, $storia->storia_id]) }}">Elimina</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
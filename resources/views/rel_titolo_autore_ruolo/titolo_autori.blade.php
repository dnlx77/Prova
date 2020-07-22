@extends('layouts.main')
@section('content')
<a href="{{ route('titolo.aggiungi_autore', $titolo->id) }}">Aggiungi autori</a> di {{ $titolo->nome }}<br/>
<table>
    <thead>
        <tr>
            <th>Autori</th>
            <th>Ruoli</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($info_autori AS $id_autore => $info_autore)
        <tr>
            <td>{{ $info_autore['nome'] }}</td>
            <td>
                <?php print implode($info_autore['ruoli'], '<br/>') ?>
            </td>
        <td><a href="{{ route('titolo.aggiungi_autore', [$titolo->id, 'autore_id' => $id_autore]) }}">Modifica</a></td>
        <td><a href="{{ route('titolo.elimina_autore_form', [$titolo->id, $id_autore]) }}">Elimina</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
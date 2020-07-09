@extends('layouts.main')
@section('content')
Autori di {{ $titolo->nome }}
<table>
    <thead>
        <tr>
            <th>Autori</th>
            <th>Ruoli</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($info_autori AS $id_autore => $info_autore)
        <tr>
            <td>{{ $info_autore['nome'] }}</td>
            <td>
                <?php print implode($info_autore['ruoli'], '<br/>') ?>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('editore.create') }}">Definisci un nuovo editore</a><br><br>

<table>
    <thead>
        <tr>
            <th>Editore</th>
            <th>Modifica</th>
<<<<<<< HEAD
            <th>Elimina</th>
=======
>>>>>>> 1218a2316fc72960efc8a158051b7176abe57b37
            <th>Data inserimento</th>
            <th>Data aggiornamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($editori AS $editore)
            <tr>
                <td>{{ $editore->nome }}</td>
                <td><a href="{{ route('editore.edit', $editore->id) }}">modifica</a></td>
<<<<<<< HEAD
                <td><a href="{{ route('editore.elimina_form', $editore->id) }}">elimina</a></td>
=======
>>>>>>> 1218a2316fc72960efc8a158051b7176abe57b37
                <td>{{ $editore->created_at }}</td>
                <td>{{ $editore->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
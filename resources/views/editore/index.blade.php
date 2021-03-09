@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('editore.create') }}">Definisci un nuovo editore</a><br><br>
<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Editore</th>
                <th>Albi</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($editori AS $editore)
                <tr>
                    <td>{{ $editore->nome }}</td>
                    <td>
                        <ul class="multi-row">
                            @foreach ($editore->albi AS $albo)
                                <li><a href="{{ route('albo.show', $albo->id) }}">{{ $albo->titolo }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td><a href="{{ route('editore.edit', $editore->id) }}">modifica</a></td>
                    <td><a href="{{ route('editore.elimina_form', $editore->id) }}">elimina</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
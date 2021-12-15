@extends('layouts.main')
@section('content')
<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Editore</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($editori AS $editore)
                <tr>
                    <td>{{ $editore->nome }}</td>
                    <td><a href="{{ route('editore.edit', $editore->id) }}">modifica</a></td>
                    <td><a href="{{ route('editore.elimina_form', $editore->id) }}">elimina</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.main')
@section('content')
    <br>La storia "{{ $storia->nome }}" si trova nei seguenti albi:<br><br>
    <div class="table-container">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Copertina</th>
                <th>Numero albo</th>
                <th>Titolo</th>
                <th>Editore</th>
                <th>Data di lettura</th>
                <th>Collana</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($storia->albi AS $albo)
                <tr>
                    <td><a href="{{ route('albo.details', $albo->id) }}">
                        <div class="immagine-tabella-wrapper">
                          <img src="{{ url('storage/'.$albo->filename) }}" class="card-img-top" alt="{{ $albo->filename }}">
                        </div></a>
                    </td>
                    <td>{{ $albo->numero }}</td>
                    <td>{{ $albo->titolo }}</td>
                    <td>{{ $albo->editore->nome }}</td>
                    <td>{{ !empty($albo->data_lettura) ? date('d/m/Y', strtotime($albo->data_lettura)) : 'Da leggere' }}</td>
                    <td>{{ $albo->collana ? $albo->collana->nome : '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
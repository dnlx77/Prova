@extends('layouts.main')
@section('content')
<br><br><a href="{{ route('storia.create') }}">Inserisci una nuova storia</a><br><br>

<form action="{{ route('storia.index') }}">
    <input class="form-control" placeholder="cerca" type="search" name="storia_search" value="{{ $storia_search }}">
    <button type="submit" class="btn btn-primary">Cerca</button>
</form>

<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Titolo storia</th>
                <th>Trama</th>
                <th>Data lettura</th>
                <th>Stato storia</th>
                <th>Modifica</th>
                <th>Autori</th>
                <th>Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($storie AS $storia)
                <tr>
                    <td>{{ $storia->nome }}</td>
                    <td>{{ $storia->trama }}</td>
                    <td>{{ !empty($storia->data_lettura) ? date('d/m/Y', strtotime($storia->data_lettura)) : 'da leggere' }}                   
                    <td>{{ \App\Enums\TipoStoriaEnum::getDescription($storia->stato) }}</td>
                    <td><a href="{{ route('storia.edit', $storia->id) }}">modifica</a></td>
                    <td><a href="{{ route('storia.autore', $storia->id) }}">autori</a></td>
                    <td><a href="{{ route('storia.elimina_form', $storia->id) }}">elimina</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $storie->appends(['storia_search' => $storia_search])->links() }}
</div>
@endsection
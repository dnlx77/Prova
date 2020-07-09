@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store_autore', $id_titolo) }}">
    @csrf
    <div class="form-group">
        <label for="titolo">Autore:</label>
        <select name="autore">
            @foreach ($lista_autori as $current_autore)
                <option value="{{ $current_autore->id }}">{{ $current_autore->nome . ' ' . $current_autore->cognome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="titolo">Ruolo:</label>
        <select name="ruolo[]" multiple="multiple">
            @foreach ($lista_ruoli as $current_ruolo)
                <option value="{{ $current_ruolo->id }}">{{ $current_ruolo->descrizione }}</option>
            @endforeach
        </select>
    </div>
	<button type="submit" class="btn btn-primary">Salva</button>
</form>
@endsection
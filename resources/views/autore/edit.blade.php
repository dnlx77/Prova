@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('autore.update', $autore->id) }}">
    @csrf
	<div class="form-group">
		<label for="titolo">Cognome:</label>
        <input type="text" class="form-control" name="cognome" value="{{ !empty(old('cognome')) ? old('cognome') : ($autore->cognome ? $autore->cognome : '') }}"/>
        <label for="titolo">Nome:</label>
		<input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : ($autore->nome ? $autore->nome : '') }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
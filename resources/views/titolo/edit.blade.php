@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.update', $titolo->id) }}">
    @csrf
	<div class="form-group">
		<label for="titolo">Titolo:</label>
        <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($titolo->nome) ? $titolo->nome : '') }}"/>
        <label for="titolo">Trama:</label>
		<input type="text" class="form-control" name="trama" value="{{ !empty(old('nome')) ? old('nome') : (!empty($titolo->trama) ? $titolo->trama : '') }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
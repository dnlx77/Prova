@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('ruolo.update', $ruoli->id) }}">
    @csrf
	<div class="form-group">
		<label for="titolo">Ruolo:</label>
        <input type="text" class="form-control" name="descrizione" value="{{ !empty(old('descrizione')) ? old('descrizione') : ($ruoli->descrizione? $ruoli->descrizione : '') }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
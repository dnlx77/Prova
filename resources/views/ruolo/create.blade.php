@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('ruolo.store') }}">
    @csrf
	<div class="form-group">
		<label for="titolo">Ruolo:</label>
		<input type="text" class="form-control" name="descrizione" value="{{ !empty(old('titolo')) ? old('titolo') : '' }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
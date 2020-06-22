@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('fumetti.update', $fumetto->id) }}">
    @csrf
	<div class="form-group">
		<label for="titolo">Titolo:</label>
		<input type="text" class="form-control" name="titolo" value="{{ !empty(old('titolo')) ? old('titolo') : ($fumetto->titolo ? $fumetto->titolo : '') }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
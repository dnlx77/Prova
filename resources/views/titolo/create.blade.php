@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store') }}">
    @csrf
	<div class="form-group">
		<label for="nome">Titolo fumetto:</label>
        <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? !empty(old('nome')) : '' }}"/>
        <label for="trama">Trama:</label>
		<input type="text" class="form-control" name="trama" value="{{ !empty(old('trama')) ? !empty(old('trama')) : '' }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
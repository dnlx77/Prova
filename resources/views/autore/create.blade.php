@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('autore.store') }}">
    @csrf
	<div class="form-group">
		<label for="cognome">Cognome:</label>
        <input type="text" class="form-control" name="cognome" value="{{ !empty(old('cognome')) ? old('cognome') : '' }}"/>
        <label for="nome">Nome:</label>
		<input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : '' }}"/>
	</div>
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
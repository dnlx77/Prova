@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('autore.update', $autore->id) }}">
    @csrf
	@include('autore.form', [])
		<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
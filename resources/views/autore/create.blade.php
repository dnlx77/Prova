@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('autore.store') }}">
    @csrf
	@include('autore.form', [])
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
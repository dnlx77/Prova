@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('ruolo.store') }}">
    @csrf
	@include('ruolo.form', [])
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
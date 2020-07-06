@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store') }}">
    @csrf
	@include('titolo.form', [])
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.update', $titolo->id) }}">
    @csrf
	@include('titolo.form', [])
		<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
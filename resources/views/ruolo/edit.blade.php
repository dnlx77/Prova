@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('ruolo.update', $ruoli->id) }}">
	@csrf
	@include('ruolo.form', [])
	<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
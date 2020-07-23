@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('collana.update', $collane->id) }}">
	@csrf
	@include('collana.form', [])
	<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
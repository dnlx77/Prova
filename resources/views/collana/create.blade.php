@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('collana.store') }}">
    @csrf
	@include('collana.form', [])
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
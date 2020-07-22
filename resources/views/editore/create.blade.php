@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('editore.store') }}">
    @csrf
	@include('editore.form', [])
		<button type="submit" class="btn btn-primary">Aggiungi</button>
</form>
@endsection
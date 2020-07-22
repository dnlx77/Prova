@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('editore.update', $editori->id) }}">
	@csrf
	@include('editore.form', [])
	<button type="submit" class="btn btn-primary">Aggiorna</button>
</form>
@endsection
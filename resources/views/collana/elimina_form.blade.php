@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('collana.elimina_execute', $id_collana) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Elimina</button>
@endsection
</form>
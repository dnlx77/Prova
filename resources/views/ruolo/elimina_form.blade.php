@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('ruolo.elimina_execute', $id_ruolo) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Elimina</button>
@endsection
</form>
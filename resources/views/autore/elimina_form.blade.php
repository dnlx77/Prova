@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('autore.elimina_execute', $id_autore) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Elimina</button>
@endsection
</form>
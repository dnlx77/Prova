@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store_autore', $id_titolo) }}">
    @csrf
    @include('rel_titolo_autore_ruolo.form', [])
    <button type="submit" class="btn btn-primary">Salva</button>
</form>

@endsection
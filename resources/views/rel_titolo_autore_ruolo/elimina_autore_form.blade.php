@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.elimina_autore_execute', array(1, 1)) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Elimina</button>
</form>
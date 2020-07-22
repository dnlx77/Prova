@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('editore.elimina_execute', $id_editore) }}">
    @csrf
    <button type="submit" class="btn btn-primary">Elimina</button>
@endsection
</form>
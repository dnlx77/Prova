@extends('layouts.main')
@section('content')
    <div class="col-4">
        <form enctype="multipart/form-data" method="post" action="{{ route('cerca.search') }}">
            @csrf
            @include('cerca.form', [])
                <button type="submit" class="btn btn-primary">Cerca</button>
        </form>
    </div>
@endsection
@extends('layouts.main')
@section('content')

<div class="inserisci-menu-wrapper">
    <ul class="inserisci-menu">
        <li><a href="{{ route('autore.create') }}">Inserisci un autore</a></li>
        <li><a href="{{ route('albo.create') }}">Inserisci un albo</a></li>
    </ul>
</div>
@endsection
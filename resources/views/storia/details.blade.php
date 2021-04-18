@extends('layouts.main')
@section('content')

<div class="container albo-details">
    <!-- Riga del titolo -->
    <div class="row justify-content-center">
        <h1> {{ $storia->nome }} </h1>
    </div>
    @foreach ($lista_ruoli AS $id_ruolo => $lista_autore)
        <span>{{ $lista_autore['ruolo'] }}</span>
        <ul>
            @foreach ($lista_autore['nome'] as $autore)
                <li><span>{{ $autore }}</span></li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
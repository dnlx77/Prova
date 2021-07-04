@extends('layouts.main')
@section('content')

<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valore</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Numero albi</td>
                <td> {{ $num_albi }}</td>
            </tr>
            <tr>
                <td>Numero autori</td>
                <td> {{ $num_autori }}</td>
            </tr>
            <tr>
                <td>Numero storie</td>
                <td> {{ $num_storie }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
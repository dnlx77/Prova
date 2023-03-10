@extends('layouts.main')
@section('content')

<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                @foreach ($num_albi_per_anno AS $anno => $numero_albi)
                    <th>{{ $anno }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($num_albi_per_anno AS $anno => $numero_albi)
                    <td> <a href="{{ route('statistiche.albi_mese', $anno)}}">{{ $numero_albi }}</a></td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

@endsection
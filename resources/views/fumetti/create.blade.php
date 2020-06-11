@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('fumetti.store') }}">
                @csrf
				<div class="form-group">
					<label for="titolo">Titolo:</label>
					<input type="text" class="form-control" name="titolo" value="{{ !empty(old('titolo')) ? old('titolo') : '' }}"/>
				</div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
@endsection
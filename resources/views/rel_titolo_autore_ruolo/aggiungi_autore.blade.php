@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store_autore', $id_titolo) }}">
    @csrf
    <div class="form-group">
        <label for="titolo">Autore:</label>
        <select name="autore">
            <option value=""></option>
            @foreach ($lista_autori as $current_autore)
                <option value="{{ $current_autore->id }}">{{ $current_autore->nome . ' ' . $current_autore->cognome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="titolo">Ruolo:</label>
        <select id="ruolo_select" name="ruolo[]" multiple="multiple">
            @foreach ($lista_ruoli as $current_ruolo)
                <option value="{{ $current_ruolo->id }}">{{ $current_ruolo->descrizione }}</option>
            @endforeach
        </select>
    </div>
	<button type="submit" class="btn btn-primary">Salva</button>
</form>
<script>
    $(document).ready(function(){
        $('[name=autore]').on('change', function(){
            $.ajax({
            url:"/titolo/{{ $id_titolo }}/" + $(this).val() + "/services/get-ruoli-json",
            method:"GET",
            data:{},
            dataType: 'json',
            success:function(result)
            {
                //var json=JSON.parse (result);
                console.log(result);
                /*var $el =$("#ruolo_select");
                $el.empty();
                $el.each(result, function(key, value) {
                     $el.append($("<option></option>")
                    .attr("value", value).text(key));
                });*/
            },
            error:function()
            {
                console.log(error);
            }
            });
        });
    });
</script>
@endsection
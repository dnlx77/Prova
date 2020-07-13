@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.update_autore', $id_titolo) }}">
    @csrf
	@include('rel_titolo_autore_ruolo.form', [])
		<button type="submit" class="btn btn-primary">Aggiorna</button>
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
                console.log(result);
                var $el =$("#ruolo_select");
                /*$el.empty();
                $.each(result, function(key, value) {
                     $el.append($("<option></option>")
                    .attr("value", key).text(value));
                });*/
                $el.val(result);
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
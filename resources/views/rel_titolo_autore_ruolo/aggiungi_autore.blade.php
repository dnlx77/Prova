@extends('layouts.main')
@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('titolo.store_autore', $id_titolo) }}">
    @csrf
    @include('rel_titolo_autore_ruolo.form', [])
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
                console.log(result);
                var $el =$("#ruolo_select");
                
                $el.val(result);
            },
            error:function()
            {
                console.log(error);
            }
            });
        });
        @if (!empty($id_autore_default)) 
            $('[name=autore]').val({{ $id_autore_default }});
            $('[name=autore]').trigger('change');
        @endif
    });
</script>
@endsection
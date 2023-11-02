@extends('layouts.main')
@section('content')

<div class="form-group">
    <label for="anno">Anno:</label>
    <select id="anno-select" name="anno">
        @for ($i=$primo_anno;$i<=$ultimo_anno;$i++ )
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
</div>

<div class="table-container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                @foreach ($num_albi_per_mese AS $mese => $numero_albi)
                    <th>{{ $mese }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($num_albi_per_mese AS $mese => $numero_albi)
                    <td> <a href="{{ route('statistiche.get_albi_mese_anno', array( date('m',strtotime($mese)), last(request()->segments()) ) ) }}">{{ $numero_albi }}</a></td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div>
    <span>Albi totali pubblicati nell'anno: {{ $num_albi_anno }} </span>
</div>

<script>
    $(document).ready(function() {
        
        var pathname = window.location.pathname;
        var anno = pathname.substr(pathname.length-4,4);
       
        $('#anno-select').val(anno);
        
        $('#anno-select').on('change', function() {
            var selVal=$(this).val();
            window.location.href = "{{ route('statistiche.albi_mese', '') }}" + "/" + selVal;
            
            /* La riga sotto è equivalente a quella sopra ma quella soptra è più legibile */
            //window.location.href=selVal;
        });
    });
</script>
@endsection
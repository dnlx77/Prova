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
                    <td> {{ $numero_albi }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        
        var selItem = sessionStorage.getItem("selItem");
        $('#anno-select').val(selItem);
        
        $('#anno-select').on('change', function() {
            console.log('sono in change');
           var selVal=$(this).val();
           sessionStorage.setItem("selItem", selVal);
           window.location.href=selVal;
        });
    });
</script>
@endsection
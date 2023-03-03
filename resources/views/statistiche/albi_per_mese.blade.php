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
                <th>Mese</th>
                <th>Numero Albi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($num_albi_per_mese AS $mese => $numero_albi)
                <tr>
                    <td>{{ $mese }}</td>
                    <td> {{ $numero_albi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        /*var mySelectBoxVal = localstorage.getItem("mySelectBoxVal");
        if (mySelectBoxVal !== '') {
            $('#anno-select').val(mySelectBoxVal);
        }*/

        $('#anno-select').on('change', function(){
            /*selectBoxVal = $('#anno-select').val();
            if (typeof(Storage) !== "undefined") {
                localStorage.setItem("mySelectBoxVal", selectBoxVal);
            } else {
                alert('Sorry! No Web Storage support..');
            }*/
           //window.location.href="statistiche/albi-pubblicati-anno/" + $(this).val();
           window.location.href=this.value;
           //window.location.reload();
        });
    });
</script>
@endsection
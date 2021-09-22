<div class="form-group">
    <label for="cerca">Cerca:</label>
    <select id="cerca-select" name="cerca_in">
        @foreach ($lista_campi_ricerca as $current_campo)
            <option value="{{ $current_campo }}">{{ $current_campo }}</option>
        @endforeach
    </select>

    <label id="cerca-label" for="titolo">albo da cercare:</label>
    <input type="search" class="form-control" name="titolo"/>
</div>

<script>
    $(document).ready(function(){
        $('#cerca-select').on('change', function(){
            
            var valore_select = $('#cerca-select :selected').text();
            $('#cerca-label').text(valore_select+" da cercare");
    })});
</script>
<div class="form-group">
    <label for="cerca">Cerca:</label>
    <select id="cerca-select" name="cerca_in">
        @foreach ($lista_campi_ricerca as $current_campo)
            <option value="{{ $current_campo }}">{{ $current_campo }}</option>
        @endforeach
    </select>

    <label id="cerca-label" for="titolo">Titolo albo da cercare:</label>
    <input type="search" class="form-control" name="titolo"/>
</div>

<script>
    $(document).ready(function(){
        $("#cerca-select").on('change', function(){
            
            $("#cerca-label").val('prova');
            $("#cerca-label").trigger('change');
    });
</script>
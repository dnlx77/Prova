<div class="form-group">
    <label for="cerca">Cerca:</label>
    <select id="cerca-select" name="cerca_in">
        @foreach ($lista_campi_ricerca as $current_campo)
            <option value="{{ $current_campo }}">{{ $current_campo }}</option>
        @endforeach
    </select>
    <div id="cerca-per-albo">
        <select id="cerca-select" name="cerca_per">
            @foreach ($lista_campi_per_albo as $current_per_albo)
                <option value="{{ $current_per_albo }}">{{ $current_per_albo }}</option>
            @endforeach
        </select>
    </div>

    <div id="cerca-per-autore">
        <select id="cerca-select" name="cerca_per">
            @foreach ($lista_campi_per_autore as $current_per_autore)
                <option value="{{ $current_per_autore }}">{{ $current_per_autore }}</option>
            @endforeach
        </select>
    </div>

    <label id="cerca-label" for="ricerca">albo da cercare:</label>
    <input type="search" class="form-control" name="ricerca"/>

    <input type="checkbox" id="cerca-checkbox" name="esatta" value="true">
    <label for="cerca-checkbox">Ricerca esatta</label>
</div>

<script>
    $(document).ready(function(){

        $("#cerca-per-albo").show();
        $("#cerca-per-autore").hide();
        $('#cerca-select').on('change', function(){
            
            var valore_select = $('#cerca-select :selected').text();

            switch(valore_select){
                case 'autori':
                    $("#cerca-per-albo").hide();
                    $("#cerca-per-autore").show();
                    break;
                
                case 'albi':
                    $("#cerca-per-albo").show();
                    $("#cerca-per-autore").hide();
                    break;
            }

        $('#cerca-label').text(valore_select+" da cercare");
    })});
</script>
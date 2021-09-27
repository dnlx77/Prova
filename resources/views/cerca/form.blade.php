<div class="form-group">
    <label for="cerca">Cerca:</label>
    <select id="cerca-select" name="cerca_in">
        @foreach ($lista_campi_ricerca as $current_campo)
            <option value="{{ $current_campo }}">{{ $current_campo }}</option>
        @endforeach
    </select>

    <label for="per">per</label>
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

    <label for="tipo-ricerca-select">Tipo di ricerca</label>
    <select id="tipo-ricerca-select" name="tipo_ricerca">
        <option value="iniziaPer">Inizia per</option>
        <option value="contiene">Contiene</option>
        <option value="esatta">Esatta</option>
    </select>

    <div id="data-pubblicazione">
        <label for="data pubblicazione">Data iniziale di pubblicazione:</label>
        <input id="data-pub-iniz" type="text" class="form-control" name="data_pub_iniziale"/>
        <label for="data pubblicazione">Data finale di pubblicazione:</label>
        <input id="data-pub-fin" type="text" class="form-control" name="data_pub_finale"/>
    </div>
    
</div>

<script>
    $(document).ready(function(){

        $("#data-pub-iniz").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        })

        $("#data-pub-fin").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        })

        $("#cerca-per-albo").show();
        $("#cerca-per-autore").hide();
        $("#data-pubblicazione").show();
        $("#cerca-per-autore").children().prop('disabled',true);
        $("#cerca-per-albo").children().prop('disabled',false);
        $("#data-pubblicazione").children().prop('disabled',false);

        $('#cerca-select').on('change', function(){
            
            var valore_select = $('#cerca-select :selected').text();

            switch(valore_select){
                case 'autori':
                    $("#cerca-per-albo").hide();
                    $("#cerca-per-autore").show();
                    $("#data-pubblicazione").hide();
                    $("#cerca-per-albo").children().prop('disabled',true);
                    $("#cerca-per-autore").children().prop('disabled',false);
                    $("#data-pubblicazione").children().prop('disabled',true);
                    break;
                
                case 'albi':
                    $("#cerca-per-albo").show();
                    $("#cerca-per-autore").hide();
                    $("#data-pubblicazione").show();
                    $("#cerca-per-autore").children().prop('disabled',true);
                    $("#cerca-per-albo").children().prop('disabled',false);
                    $("#data-pubblicazione").children().prop('disabled',false);
                    break;
            }

        $('#cerca-label').text(valore_select+" da cercare");

       
        });

        });
</script>
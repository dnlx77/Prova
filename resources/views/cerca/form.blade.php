@section ('option_tipo_ricerca')
    <select class="tipo-ricerca-select" name="tipo_ricerca">
        <option value="iniziaPer">Inizia per</option>
        <option value="contiene">Contiene</option>
        <option value="esatta">Esatta</option>
    </select>
@endsection

<div class="form-group">
    <label for="cerca">Cerca:</label>
    <select id="cerca-select" name="cerca_in">
    @foreach ($lista_campi_ricerca as $current_campo)
        <option value="{{ $current_campo }}">{{ $current_campo }}</option>
    @endforeach
    </select>

    <label for="per">per</label>

    <div id="cerca-per-albo">
        <select id="albo-cerca-per-select" name="cerca_per">
        @foreach ($lista_campi_per_albo as $current_per_albo)
            <option value="{{ $current_per_albo }}">{{ $current_per_albo }}</option>
        @endforeach
        </select>

        <select id="cerca-collane" name="ricerca">
        @foreach ($lista_collane as $collana)
            <option value="{{ $collana->id }}">{{ $collana->nome}}</option>
        @endforeach
        </select>

        <div id="label-cerca-albi">
            <label class="cerca-label" for="ricerca">albo da cercare:</label>
            <input type="search" class="form-control" name="ricerca"/>
        </div>

        <div id="albo-tipo-ricerca">
            <label for="tipo-ricerca-select">Tipo di ricerca</label>
            @yield('option_tipo_ricerca')
        </div>
       
        <div id="data-pubblicazione">
            <label for="data pubblicazione">Data iniziale di pubblicazione:</label>
            <input class="data-pub" type="text" class="form-control" name="data_pub_iniziale"/>
            <label for="data pubblicazione">Data finale di pubblicazione:</label>
            <input class="data-pub" type="text" class="form-control" name="data_pub_finale"/>
        </div>
    </div>

    <div id="cerca-per-autore">
        <select id="autore-cerca-per-select" name="cerca_per">
        @foreach ($lista_campi_per_autore as $current_per_autore)
            <option value="{{ $current_per_autore }}">{{ $current_per_autore }}</option>
        @endforeach
        </select>

        <div id="label-cerca-autori">
            <label class="cerca-label" for="ricerca">autore da cercare:</label>
            <input type="search" class="form-control" name="ricerca"/>
        </div>

        <div id="autore-tipo-ricerca">
            <label for="tipo-ricerca-select">Tipo di ricerca</label>
            @yield('option_tipo_ricerca')
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function(){

        $('.data-pub').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        })

        /* Per default visualizziamo la ricerca per albo */

        $('#cerca-per-autore').hide();
        $('#cerca-per-autore *').contents().prop('disabled',true);
        $('#cerca-collane').hide();
        $('#cerca-collane').prop('disabled',true);
        $('#cerca-per-albo').show();
        $('#cerca-per-albo *').contents().prop('disabled',false);

        /* Modifichiamo il form a seconda di cosa cerchiamo (es. albi, autori, ...) */

        $('#cerca-select').on('change', function(){
            
            var valore_select = $('#cerca-select :selected').text();

            console.log(valore_select);

            switch(valore_select){
                case 'autori':
                    $('#cerca-per-albo').hide();
                    $('#cerca-per-albo *').contents().prop('disabled',true);
                    $('#cerca-per-autore').show();
                    $('#cerca-per-autore *').contents().prop('disabled',false);
                    break;
                
                case 'albi':
                    $('#cerca-per-autore').hide();
                    $('#cerca-per-autore *').contents().prop('disabled',true);
                    $('#cerca-per-albo').show();
                    $('#cerca-per-albo *').contents().prop('disabled',false);
                    break;
            }

        //$('.cerca-label').text(valore_select+" da cercare:");

        });

        /* Mostriamo o nascondiamo i campi nelle varie possibili ricerche per albi */

        $('#albo-cerca-per-select').on('change', function(){

            var cerca_per_select = $('#albo-cerca-per-select :selected').text();
            console.log(cerca_per_select);
            switch (cerca_per_select) {
                case 'collana':
                    $('#albo-tipo-ricerca').hide();
                    $('#albo-tipo-ricerca *').contents().prop('disabled',true);
                    $('#label-cerca-albi').hide();
                    $('#label-cerca-albi').contents().prop('disabled',true);
                    $('#cerca-collane').show();
                    $('#cerca-collane').prop('disabled',false);
                    break;
                
                case 'tutto':
                    $('#cerca-collane').hide();
                    $('#cerca-collane').prop('disabled',true);
                    $('#albo-tipo-ricerca').hide();
                    $('#albo-tipo-ricerca *').contents().prop('disabled',true);
                    $('#label-cerca-albi').hide();
                    $('#label-cerca-albi *').contents().prop('disabled',true);
                    break;

                default:
                    $('#cerca-collane').hide();
                    $('#cerca-collane').prop('disabled',true);
                    $('#albo-tipo-ricerca').show();
                    $('#albo-tipo-ricerca *').contents().prop('disabled',false);
                    $('#label-cerca-albi').show();
                    $('#label-cerca-albi *').contents().prop('disabled',false);
                    break;
            }
        });

        /* Mostriamo o nascondiamo i campi nelle varie possibili ricerche per autori */

        $('#autore-cerca-per-select').on('change', function(){

            var cerca_per_select = $('#autore-cerca-per-select :selected').text();
            console.log(cerca_per_select);
            switch (cerca_per_select) {
                case 'tutto':
                    $('#autore-tipo-ricerca').hide();
                    $('#autore-tipo-ricerca *').contents().prop('disabled',true);
                    $('#label-cerca-autori').hide();
                    $('#label-cerca-autori *').contents().prop('disabled',true);
                    break;

                default:
                    $('#autore-tipo-ricerca').show();
                    $('#autore-tipo-ricerca *').contents().prop('disabled',false);
                    $('#label-cerca-autori').show();
                    $('#label-cerca-autori *').contents().prop('disabled',false);
                    break;
            }
        });

    });
</script>
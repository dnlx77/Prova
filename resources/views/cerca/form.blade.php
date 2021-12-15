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

    <select class="select-class" id="albo-cerca-per-select" name="cerca_per">
        @foreach ($lista_campi_per_albo as $current_per_albo)
            <option value="{{ $current_per_albo }}">{{ $current_per_albo }}</option>
        @endforeach
    </select>

    <select class="select-class" id="storia-cerca-per-select" name="cerca_per">
        @foreach ($lista_campi_per_storia as $current_per_storia)
            <option value="{{ $current_per_storia }}">{{ $current_per_storia }}</option>
        @endforeach
    </select>

    <select class="select-class" id="autore-cerca-per-select" name="cerca_per">
        @foreach ($lista_campi_per_autore as $current_per_autore)
            <option value="{{ $current_per_autore }}">{{ $current_per_autore }}</option>
        @endforeach
    </select>

    <select class="select-class" id="cerca-collane" name="ricerca">
        @foreach ($lista_collane as $collana)
            <option value="{{ $collana->id }}">{{ $collana->nome}}</option>
        @endforeach
    </select>

    <div id="div-select-cerca-storie-autori">
        <select class="select-class" id="cerca-storie-autori" name="ricerca">
            @foreach ($lista_autori as $autori)
                <option value="{{ $autori->id }}">{{ $autori->cognome}} {{ $autori->nome}}</option>
            @endforeach
        </select>
    </div>

    <div id="label-cerca">
        <label class="cerca-label" for="ricerca">albo da cercare:</label>
        <input type="search" class="form-control" name="ricerca"/>
    </div>

    <div id="tipo-ricerca">
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

<script>
    $(document).ready(function(){

        $('.data-pub').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true
        })

        $('#cerca-storie-autori').select2();

        /* Per default visualizziamo la ricerca per albo */

        $('.select-class').hide();
        $('#div-select-cerca-storie-autori').hide();
        $('.select-class').prop('disabled' ,true);
        $('#albo-cerca-per-select').show();
        $('#albo-cerca-per-select').prop('disabled', false);

        /* Modifichiamo il form a seconda di cosa cerchiamo (es. albi, autori, ...) */

        $('#cerca-select').on('change', function(){
            
            var valore_select = $('#cerca-select :selected').text();

            console.log(valore_select);

            switch(valore_select){
                case 'autori':
                    $('.select-class').hide();
                    $('#div-select-cerca-storie-autori').hide();
                    $('.select-class').prop('disabled', true);
                    $('#data-pubblicazione').hide();
                    $('.data-pub').prop('disabled', true);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    $('#autore-cerca-per-select').show();
                    $('#autore-cerca-per-select').prop('disabled', false);
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    break;

                case 'storie':
                    $('.select-class').hide();
                    $('#div-select-cerca-storie-autori').hide();
                    $('.select-class').prop('disabled', true);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    $('#data-pubblicazione').show();
                    $('.data-pub').prop('disabled', false);
                    $('#storia-cerca-per-select').show();
                    $('#storia-cerca-per-select').prop('disabled', false);
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    break;

                case 'albi':
                    $('.select-class').hide();
                    $('#div-select-cerca-storie-autori').hide();
                    $('.select-class').prop('disabled', true);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    $('#data-pubblicazione').show();
                    $('.data-pub').prop('disabled', false);
                    $('#albo-cerca-per-select').show();
                    $('#albo-cerca-per-select').prop('disabled', false);
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    break;
            }

            $('.cerca-label').text(valore_select+" da cercare:");

        });

        /* Mostriamo o nascondiamo i campi nelle varie possibili ricerche per albi */

        $('#albo-cerca-per-select').on('change', function(){

            var cerca_per_select = $('#albo-cerca-per-select :selected').text();
            console.log(cerca_per_select);
            switch (cerca_per_select) {
                case 'collana':
                    $('#tipo-ricerca').hide();
                    $('#tipo-ricerca *').contents().prop('disabled', true);
                    $('#label-cerca').hide();
                    $('#label-cerca :input').prop('disabled', true);
                    $('#cerca-collane').show();
                    $('#cerca-collane').prop('disabled', false);
                    break;
                
                case 'tutto':
                    $('#tipo-ricerca').hide();
                    $('#tipo-ricerca *').contents().prop('disabled', true);
                    $('#label-cerca').hide();
                    $('#label-cerca :input').prop('disabled', true);
                    $('#cerca-collane').hide();
                    $('#cerca-collane').prop('disabled', true);
                    break;

                default:
                    $('#cerca-collane').hide();
                    $('#cerca-collane').prop('disabled', true);
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    break;
            }
        });

        /* Mostriamo o nascondiamo i campi nelle varie possibili ricerche per storie */

        $('#storia-cerca-per-select').on('change', function(){

            var cerca_per_select = $('#storia-cerca-per-select :selected').text();
            console.log(cerca_per_select);
            switch (cerca_per_select) {
                case 'autore':
                    $('#tipo-ricerca').hide();
                    $('#tipo-ricerca *').contents().prop('disabled', true);
                    $('#label-cerca').hide();
                    $('#label-cerca :input').prop('disabled', true);
                    $('#div-select-cerca-storie-autori').show();
                    $('#cerca-storie-autori').prop('disabled', false);
                    break;

                case 'tutto':
                    $('#tipo-ricerca').hide();
                    $('#tipo-ricerca *').contents().prop('disabled', true);
                    $('#label-cerca').hide();
                    $('#label-cerca :input').prop('disabled', true);
                    $('#div-select-cerca-storie-autori').hide();
                    $('#cerca-storie-autori').prop('disabled', true);
                    break;

                default:
                    $('#div-select-cerca-storie-autori').hide();
                    $('#cerca-storie-autori').prop('disabled', true);
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    break;
            }
        });

        /* Mostriamo o nascondiamo i campi nelle varie possibili ricerche per autori */

        $('#autore-cerca-per-select').on('change', function(){

            var cerca_per_select = $('#autore-cerca-per-select :selected').text();
            console.log(cerca_per_select);
            switch (cerca_per_select) {
                case 'tutto':
                    $('#tipo-ricerca').hide();
                    $('#tipo-ricerca *').contents().prop('disabled', true);
                    $('#label-cerca').hide();
                    $('#label-cerca :input').prop('disabled', true);
                    break;

                default:
                    $('#tipo-ricerca').show();
                    $('#tipo-ricerca *').contents().prop('disabled', false);
                    $('#label-cerca').show();
                    $('#label-cerca :input').prop('disabled', false);
                    break;
            }
        });

    });
</script>
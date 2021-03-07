@extends('layouts.main')
@section('content')
    <div class="container albo-details">
        <!-- Riga del titolo -->
        <div class="row justify-content-center">
            <h1> {{ $albo->titolo }} </h1>
        </div>
        <!-- Seconda riga divisa in 2 colonne -->
        <div class="row">
            <!-- Colonna di sinistra contiene l'imamgine della copertina -->
            <div class="col-6"><img src="{{ url('storage/'.$albo->filename) }}" class="card-img-top" alt="{{ $albo->filename }}"></div>
            <!-- Colonna di destra tutti i dati dell'albo -->
            <div class="col-6">
                <div class="row">
                    <div class="col-6"><h5>Numero albo</h5>{{ $albo->numero }}</div>
                    <div class="col-6"><h5>Prezzo</h5>{{ $albo->prezzo }} &euro;</div>
                </div>
                <div class="row">
                    <div class="col-6"><h5>Data di pubblicazione</h5>{{ date('d/m/Y', strtotime($albo->data_pubblicazione)) }}</div>
                    <div class="col-6"><h5>Data di lettura</h5>{{ !empty($albo->data_lettura) ? date('d/m/Y', strtotime($albo->data_lettura)) : 'da leggere' }}</div>
                </div>
                <div class="row">
                    <div class="col-6"><h5>Editore</h5>{{ $albo->editore->nome }}</div>
                    @if (!empty($albo->collana->nome))
                        <div class="col-6"><h5>Collana</h5>{{ $albo->collana->nome }}</div>
                    @else
                        <div class="col-6"><h5>Collana</h5>Nessuna collana</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>Autori copertina</h5>
                        @foreach ($albo->autoriCopertina AS $autoreCopertina)
                            {{ $autoreCopertina->nome }} {{ $autoreCopertina->cognome }}
                            <br>
                        @endforeach
                    </div>
                    <div class="col-6">
                        <h5>Storie albo</h5>
                        @foreach ($albo->storie AS $storia)
                            <a data-target="#tramaModal" class="modale-trama" data-toggle="modal" data-id-storia="{{ $storia->id }}" href="#tramaModal"> {{ $storia->nome }} </a>
                            <br>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col"><h5>Codice a barre</h5>{{ $albo->barcode }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="tramaModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Trama</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"></div>
          </div>
        </div>
      </div>
      <!-- Script gestione modal -->
      <script>
        $(document).ready(function(){
            $('.modale-trama').on('click', (function(){
                $.ajax({
                    url:"/storia/" + $(this).attr('data-id-storia') + "/services/get-trame",
                    method:"GET",
                    data:{},
                    dataType: 'json',
                    success:function(result){
                        $('.modal-title').html(result.titolo);
                        $('.modal-body').html(result.trama);
                        console.log(result[0]);
                    },
                    error:function() {
                        console.log();
                    }
                });
            }));
        });
    </script>
@endsection
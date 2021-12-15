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
                    <div class="col-6"><h5>Numero albo</h5><span>{{ $albo->numero }}</span></div>
                    @if ($albo->prezzo)
                        <div class="col-6"><h5>Prezzo</h5><span>{{ $albo->prezzo }} &euro;</span></div>
                    @elseif ($albo->prezzo_lire)
                        <div class="col-6"><h5>Prezzo</h5><span>{{ $albo->prezzo_lire }} Lire ({{ round(($albo->prezzo_lire / 1936.27), 2) }} &euro;)</span></div>
                    @else
                        <div class="col-6"><h5>Prezzo</h5></div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-6"><h5>Data di pubblicazione</h5><span>{{ date('d/m/Y', strtotime($albo->data_pubblicazione)) }}</span></div>
                    <div class="col-6"><h5>Data di lettura</h5><span><a data-target="#dataModal" class="modale-data" data-toggle="modal" href="#storieModal">{{ !empty($albo->data_lettura) ? date('d/m/Y', strtotime($albo->data_lettura)) : 'Da leggere' }}</a></span></div>
                </div>
                <div class="row">
                    <div class="col-6"><h5>Editore</h5><span>{{ $albo->editore->nome }}</span></div>
                    <div class="col-6"><h5>Collana</h5><span>{{ $albo->collana ? $albo->collana->nome : 'Nessuna collana' }}</span></div>
                </div>
                <div class="row">
                    <div class="col-6"><h5>Codice a barre</h5>{{ $albo->barcode }}</div>
                    <div class="col-6"><h5>Numero di pagine</h5>{{ $albo->num_pagine }}</div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>Autori copertina</h5>
                        <ul class="multi-row">
                            @foreach ($albo->autoriCopertina AS $autoreCopertina)
                                @if ($autoreCopertina->pseudonimo)
                                    <li><span>{{ $autoreCopertina->nome }} '{{ $autoreCopertina->pseudonimo }}' {{ $autoreCopertina->cognome }}</span></li>
                                @else
                                    <li><span>{{ $autoreCopertina->nome }} {{ $autoreCopertina->cognome }}</span></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-6">
                        <h5>Storie albo</h5>
                        <ul class="multi-row">
                            @foreach ($albo->storie AS $storia)
                                <li><a href="{{ route('storia.details', $storia) }}"> {{ $storia->nome }} </a>
                                    <a data-target="#tramaModal" class="modale-trama" data-toggle="modal" data-id-storia="{{ $storia->id }}" href="#tramaModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                  </svg></a><i class="bi bi-camera-fill"></i></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="modal-button" type="button" class="btn btn-primary modale-data" data-toggle="modal" data-target="#dataModal">
                            Data lettura
                          </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="tramaModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Titolo della storia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Trama della storia</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dataModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inserisci la data di lettura dell'albo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" method="post" action="{{ route('albo.set_read_date', $albo->id) }}">
                    <div class="modal-body">
                    
                        @csrf
                        <label for="data_lettura">Data lettura:</label>
                        <input type="text" class="form-control" name="data_lettura" value="{{ !empty(old('data_lettura')) ? old('data_lettura') : (!empty($albo->data_lettura) ? date('d-m-Y', strtotime($albo->data_lettura)) : '') }}"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
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
                        console.log(result);
                    },
                    error:function() {
                        console.log();
                    }
                });
            }));

            $('[name=data_lettura]').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true
            });
        });
    </script>
@endsection
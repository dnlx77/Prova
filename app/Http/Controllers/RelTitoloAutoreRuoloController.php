<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autore;
use App\Ruolo;
use App\Titolo;

class RelTitoloAutoreRuoloController extends Controller
{
    //
    public function aggiungiAutore ($id_titolo) {
        $lista_autori = Autore::all();
        $lista_ruoli = Ruolo::all();
        $titolo = Titolo::find($id_titolo);
        return view('rel_titolo_autore_ruolo.aggiungi_autore',
            [ 'lista_autori' => $lista_autori,
            'lista_ruoli' => $lista_ruoli,
            'id_titolo' => $id_titolo ]);
    } 

    public function storeAutore (Request $request, $id_titolo) {
        $request->validate([
            'autore' => 'required',
            'ruolo' => 'required',
        ]);
        //SALVARE UNA RIGA PER OGNI RUOLO
    } 

}

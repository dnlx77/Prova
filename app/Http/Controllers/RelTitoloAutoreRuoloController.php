<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autore;
use App\Ruolo;
use App\Titolo;
use App\RelTitoloAutoreRuolo;

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
        
        $ruoli = $request->get('ruolo');
        foreach ($ruoli as $ruolo) {
            $titolo_autore_ruolo = new RelTitoloAutoreRuolo();
            $titolo_autore_ruolo->titolo_id = $id_titolo;
            $titolo_autore_ruolo->autore_id = $request->get('autore');
            $titolo_autore_ruolo->ruolo_id = $ruolo;
            $titolo_autore_ruolo->save ();
        }
        return redirect(route('titolo.index'))->with('success', 'Autori e ruoli aggiunti');
    } 

    public function index(Request $request, $id_titolo)
    {
        $info_autori = [
            'pippo' => ['ruolo1', 'ruolo2', 'ruolo3'],
            'pluto' => ['ruolo3', 'ruolo4']
        ];

        return view('rel_titolo_autore_ruolo.titolo_autore', [ 
            'id_titolo' => $id_titolo,
            'info_autori' => $info_autori
            ]);
    }

}

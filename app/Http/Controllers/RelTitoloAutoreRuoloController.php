<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autore;
use App\Ruolo;
use App\Titolo;
use App\RelTitoloAutoreRuolo;
use Exception;
use Illuminate\Support\Facades\DB;

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
            'autore' => 'required | max:511',
            'ruolo' => 'required | max:511',
        ]);
        //SALVARE UNA RIGA PER OGNI RUOLO
        DB::beginTransaction();
        try {
            $rimuovi_ruoli = RelTitoloAutoreRuolo::where('titolo_id', '=', $id_titolo)->where('autore_id', '=', $request->get('autore'))->delete();
            
            $ruoli = $request->get('ruolo');
            foreach ($ruoli as $ruolo) {
                $titolo_autore_ruolo = new RelTitoloAutoreRuolo();
                $titolo_autore_ruolo->titolo_id = $id_titolo;
                $titolo_autore_ruolo->autore_id = $request->get('autore');
                $titolo_autore_ruolo->ruolo_id = $ruolo;
                $titolo_autore_ruolo->save ();
            }
            DB::commit();
            return redirect(route('titolo.autore', $id_titolo))->with('success', 'Autori e ruoli aggiunti');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('titolo.index'))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    } 

    public function index(Request $request, $id_titolo)
    {
        $autori = DB::table('rel_titolo_autore_ruolo')->where('titolo_id', '=', $id_titolo)
        ->join('autore', 'autore.id', '=', 'rel_titolo_autore_ruolo.autore_id')
        ->join('ruolo', 'ruolo.id', '=', 'rel_titolo_autore_ruolo.ruolo_id')
        ->get(['autore.id AS autore_id', 'autore.nome', 'autore.cognome', 'ruolo.id AS ruolo_id', 'ruolo.descrizione']);
        
        $info_autori = [];

        foreach($autori AS $current_autore){
            if(!isset($info_autori[$current_autore->autore_id])){
                $info_autori[$current_autore->autore_id] = [];
                $info_autori[$current_autore->autore_id]['nome'] = $current_autore->nome . ' ' . $current_autore->cognome;
                $info_autori[$current_autore->autore_id]['ruoli'] = [];
            }
            $info_autori[$current_autore->autore_id]['ruoli'][$current_autore->ruolo_id] = $current_autore->descrizione;
        }

        $titolo = Titolo::find($id_titolo);

        return view('rel_titolo_autore_ruolo.titolo_autori', [ 
            'titolo' => $titolo,
            'info_autori' => $info_autori
            ]);
    }

    public function getRuoliJson($id_titolo, $id_autore) {
        /*
        FAI LA QUERY CHE RESTITUISCE UN ARRAY MONODIMENSIONALE DI RUOLI A
        PARTIRE DA TITOLO E AUTORE. POI PASSA L'ARRAY ALLA FUNZIONE JSON_ENCODE.
        VERIFICA CHE IN CONSOLE COMPAIONO I VALORI CORRETTI.
        POI SE PROPRIO TI REGGE GOOGOLA PER VEDERE COME CAMBIARE IL VALORE DI UNA SELECT
        MULTIPLA TRAMITE JSON
        */

        $ruoli = DB::table('rel_titolo_autore_ruolo')->where('titolo_id', '=', $id_titolo)->where('autore_id', '=', $id_autore)
        ->join('autore', 'autore.id', '=', 'rel_titolo_autore_ruolo.autore_id')
        ->join('ruolo', 'ruolo.id', '=', 'rel_titolo_autore_ruolo.ruolo_id')
        ->get(['ruolo.descrizione', 'ruolo.id AS ruolo_id']);

        $ruoli_array = [];
        foreach($ruoli AS $ruolo)
            $ruoli_array[] = $ruolo->ruolo_id;

        return json_encode($ruoli_array);
    }

}

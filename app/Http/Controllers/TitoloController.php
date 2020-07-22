<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titolo;
use App\RelTitoloAutoreRuolo;
use Exception;
use Illuminate\Support\Facades\DB;

class TitoloController extends Controller
{
    //
    public function create(){
        return view('titolo.create');
    } 

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required | string | max:511',
            'trama' => 'required | string | max:511',
        ]);

        $titolo = new Titolo();
        $titolo->nome = $request->get('nome');
        $titolo->trama = $request->get('trama');
        $titolo->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $titolo->save();
        return redirect(route('titolo.index'))->with('success', 'Il titolo è stato salvato.');
    }

    public function titoloEliminaForm($id_titolo) {
        return view('titolo.elimina_form', [
            'id_titolo' => $id_titolo
        ]);
    }

    public function titoloEliminaExecute($id_titolo) {
        try {
            DB::beginTransaction();
            RelTitoloAutoreRuolo::where('titolo_id', '=', $id_titolo)->delete();
            Titolo::where('id', '=', $id_titolo)->delete();
            DB::commit();
            return redirect(route('titolo.index'))->with('success', 'Titolo eliminato');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('titolo.index'))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    }

    public function index(Request $request)
    {
               
        /* 
        se l'index è stato chiamato dal form di ricerca ed è stata inserita una stringa nel form 
        la recuperiamo dalla request e la inseriamo nella variabile $scope_search, altrimenti se la form è vuota
        o se l'index non è stato chiamato dal form di ricerca $scope_search contiene la stringa vuota
        Quando chiamiamo il metodo search su fumetti viene richiamato in automatico il metodo scopeSearch definito nel model
        */
        $scope_search = $request->has('scope_search') ? $request->get('scope_search') : ''; 
        $sort_by = 'nome';
        $order_by = 'asc';
        $per_page = 3;
        $titolo = Titolo::search($scope_search)->orderBy($sort_by, $order_by)->paginate($per_page);

        return view('titolo.index', 
            [ 'titolo' => $titolo ], 
            [ 'scope_search' => $scope_search ]);
    
    }

    public function edit ($id) {
        $titolo = Titolo::find($id);
        return view('titolo.edit',
            [ 'titolo' => $titolo ]);
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'nome' => 'required | string | max:511',
            'trama' => 'required | string | max:511',
        ]);

        $titolo = Titolo::find($id);
        $titolo->nome = $request->get('nome');
        $titolo->trama = $request->get('trama');
        $titolo->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $titolo->save ();
        return redirect(route('titolo.index'))->with('success', 'Il titolo è stato aggiornato.');
    }
}

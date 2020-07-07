<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titolo;

class TitoloController extends Controller
{
    //
    public function create(){
        return view('titolo.create');
    } 

    public function store(Request $request) {
        $titolo = new Titolo();
        $titolo->nome = $request->get('nome');
        $titolo->trama = $request->get('trama');
        $titolo->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $titolo->save();
        return redirect(route('titolo.index'))->with('success', 'Il titolo è stato salvato.');
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
        $titolo = Titolo::find($id);
        $titolo->nome = $request->get('nome');
        $titolo->trama = $request->get('trama');
        $titolo->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $titolo->save ();
        return redirect(route('titolo.index'))->with('success', 'Il titolo è stato aggiornato.');
    }
}

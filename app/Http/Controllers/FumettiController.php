<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fumetti;

class FumettiController extends Controller
{
    public function create(){
        return view('fumetti.create');
    } //

    public function store(Request $request) {
        $fumetto = new Fumetti();
        $fumetto->titolo = $request->get('titolo');
        $fumetto->save();
        return redirect(route('fumetti.index'))->with('success', 'Il fumetto è stato salvato.');
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
        $sort_by = 'titolo';
        $order_by = 'asc';
        $per_page = 3;
        $titolo = Titolo::search($scope_search)->orderBy($sort_by, $order_by)->paginate($per_page);

        return view('titolo.index', 
            [ 'titolo' => $titolo ], 
            [ 'scope_search' => $scope_search ]);
    }

    public function edit ($id) {
        $fumetto = Fumetti::find($id);
        return view('fumetti.edit',
            [ 'fumetto' => $fumetto ]);
    } 

    public function update (Request $request, $id) {
        $fumetto = Fumetti::find($id);
        $fumetto->titolo = $request->get('titolo');
        $fumetto->save ();
        return redirect(route('fumetti.index'))->with('success', 'Il fumetto è stato aggiornato.');
    }
}

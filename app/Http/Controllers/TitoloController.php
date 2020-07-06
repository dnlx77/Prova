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
        $titolo->save();
        return redirect(route('titolo.index'))->with('success', 'L autore è stato salvato.');
    }

    public function index(Request $request)
    {
               
        $titolo = Titolo::all();

        return view('titolo.index', 
            [ 'titolo' => $titolo ] 
            );
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
        $titolo->save ();
        return redirect(route('titolo.index'))->with('success', 'Il titolo è stato aggiornato.');
    }
}

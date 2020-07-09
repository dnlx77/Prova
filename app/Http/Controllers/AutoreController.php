<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autore;

class AutoreController extends Controller
{
    //
    public function create(){
        return view('autore.create');
    } 

    public function store(Request $request) {
        $request->validate([
            'cognome' => 'required',
            'nome' => 'required',
        ]);

        $autore = new Autore();
        $autore->cognome = $request->get('cognome');
        $autore->nome = $request->get('nome');
        $autore->save();
        return redirect(route('autore.index'))->with('success', 'L\'autore è stato salvato.');
    }

    public function index(Request $request)
    {
               
        $autore = Autore::all();

        return view('autore.index', 
            [ 'autore' => $autore ] 
            );
    }

    public function edit ($id) {
        $autore = Autore::find($id);
        return view('autore.edit',
            [ 'autore' => $autore ]);
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'cognome' => 'required',
            'nome' => 'required',
        ]);

        $autore = Autore::find($id);
        $autore->Cognome = $request->get('cognome');
        $autore->Nome = $request->get('nome');
        $autore->save ();
        return redirect(route('autore.index'))->with('success', 'L\'autore è stato aggiornato.');
    }
}

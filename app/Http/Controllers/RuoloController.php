<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruolo;

class RuoloController extends Controller
{
    //
    public function create(){
        return view('ruolo.create');
    } 

    public function store(Request $request) {
        $ruolo = new Ruolo();
        $ruolo->descrizione = $request->get('descrizione');
        $ruolo->save();
        return redirect(route('ruolo.index'))->with('success', 'Il ruolo è stato salvato.');
    }

    public function index(Request $request)
    {
               
        $ruoli = Ruolo::all();

        return view('ruolo.index', 
            [ 'ruoli' => $ruoli ] 
            );
    }
}

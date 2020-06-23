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

    public function index()
    {
        //
        return view('fumetti.index', 
            [
                'fumetti' => Fumetti::all()
            ]);
    }

    public function edit ($id) {
        $fumetto = Fumetti::find($id);
        return view('fumetti.edit',
            [
                'fumetto' => $fumetto,
            ]);
    } 

    public function update (Request $request, $id) {
        $fumetto = Fumetti::find($id);
        $fumetto->titolo = $request->get('titolo');
        $fumetto->save ();
        return redirect(route('fumetti.index'))->with('success', 'Il fumetto è stato aggiornato.');
    }
}

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
        return redirect(route('fumetti.create'))->with('success', 'Il fumetto è stato salvato.');
    }
}

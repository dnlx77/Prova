<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FumettiController extends Controller
{
    public function create(){
        return view('fumetti.create');
    } //

    public function store(Request $request) {
        return redirect(route('fumetti.create'))->with('success', 'Il fumetto è stato salvato.');
    }
}

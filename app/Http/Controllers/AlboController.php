<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AlboController extends Controller
{
    //
    public function create(){
        return view('albo.create');
    } 

    public function store(Request $request){
        $request->validate([
            'num_pagine' => 'required | string | max:511',
            'barcode' => 'required | integer',
            'prezzo' => 'required | min:0 | max:100',
        ]);

        $copertina = $request->file('copertina');
        $estensione = $copertina->getClientOriginalExtension();
        Storage::disk('public')->put($copertina->getFilename().'.'.$estensione, File::get($copertina));

        $albo = new Albo();
        $albo->num_pagine = $request->get('num_pagine');
        $albo->prezzo = $request->get('prezzo');
        $albo->barcode = $request->get('barcode');
        $albo->mime = $copertina->getClientMimeType();
        $albo->original_filename = $copertina->getClientOriginalName();
        $albo->filename = $copertina->getFilename().'.'.$estensione;

        $albo->save();
        return redirect(route('albo.index'))->with('success', 'L\'albo è stata salvato.');
    }

    public function index(Request $request)
    {
               
        $albi = Albo::all();

        return view('albo.index', 
            [ 'albi' => $albi ] 
            );
    }

    public function edit ($id) {
        $albo = ALbo::find($id);
        return view('albo.edit',
            [ 'albo' => $albo ]);
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'num_pagine' => 'required | string | max:511',
            'barcode' => 'required | integer',
            'prezzo' => 'required | min:0 | max:100',
        ]);

        $albo = Albo::find($id);
        $albo->num_pagine = $request->get('num_pagine');
        $albo->prezzo = $request->get('prezzo');
        $albo->barcode = $request->get('barcode');
        $albo->save ();
        return redirect(route('albo.index'))->with('success', 'L\'albo è stato aggiornato.');
    }
}

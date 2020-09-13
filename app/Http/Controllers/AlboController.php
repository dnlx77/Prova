<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function alboEliminaForm($id_albo) {
        return view('albo.elimina_form', [
            'id_albo' => $id_albo
        ]);
    }

    public function alboEliminaExecute($id_albo) {

        $copertina = Albo::find($id_albo)->filename;
        
        try {
            DB::beginTransaction();
            Albo::where('id', '=', $id_albo)->delete();
            DB::commit();
            Storage::disk('public')->delete($copertina);
            return redirect(route('albo.index'))->with('success', 'Albo eliminato');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('albo.index'))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    }
}

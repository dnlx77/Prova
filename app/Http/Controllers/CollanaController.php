<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collana;
use Exception;
use Illuminate\Support\Facades\DB;

class CollanaController extends Controller
{
    //
    public function create(){
        return view('collana.create');
    } 

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required | string | max:511',
            'num_albi' => 'required | integer',
        ]);

        $collana = new Collana();
        $collana->nome = $request->get('nome');
        $collana->num_albi = $request->get('num_albi');
        $collana->save();
        return redirect(route('collana.index'))->with('success', 'La collana è stata salvata.');
    }

    public function collanaEliminaForm($id_collana) {
        return view('collana.elimina_form', [
            'id_collana' => $id_collana
        ]);
    }

    public function collanaEliminaExecute($id_collana) {
        try {
            DB::beginTransaction();
            Collana::where('id', '=', $id_collana)->delete();
            DB::commit();
            return redirect(route('collana.index'))->with('success', 'Collana eliminata');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('collana.index'))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    }

    public function index(Request $request) {
        $collane = Collana::all();

        return view('collana.index', 
            [ 
                'collane' => $collane,
            ]);
    }

    public function edit ($id) {
        $collane = Collana::find($id);
        return view('collana.edit',
            [ 
                'collane' => $collane,
            ]
        );
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'nome' => 'required | string | max:511',
            'num_albi' => 'required | integer',
        ]);

        $collane = Collana::find($id);
        $collane->nome = $request->get('nome');
        $collane->num_albi = $request->get('num_albi');
        $collane->save ();
        return redirect(route('collana.index'))->with('success', 'La collana è stato aggiornata.');
    }
}

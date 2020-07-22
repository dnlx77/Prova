<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editore;

class EditoreController extends Controller
{
    //
    public function create(){
        return view('editore.create');
    } 

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required | string | max:511',
        ]);

        $editore = new Editore();
        $editore->nome = $request->get('nome');
        $editore->save();
        return redirect(route('editore.index'))->with('success', 'L\'editore è stato salvato.');
    }

    public function index(Request $request)
    {
               
        $editori = Editore::all();

        return view('editore.index', 
            [ 'editori' => $editori ] 
            );
    }

    public function edit ($id) {
        $editori = Editore::find($id);
        return view('editore.edit',
            [ 'editori' => $editori ]);
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'nome' => 'required | string | max:511',
        ]);

        $editori = Editore::find($id);
        $editori->nome = $request->get('nome');
        $editori->save ();
        return redirect(route('editore.index'))->with('success', 'L\'editore è stato aggiornato.');
    }
}

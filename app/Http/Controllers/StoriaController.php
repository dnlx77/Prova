<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storia;
use App\RelStoriaAutoreRuolo;
use App\Enums\TipoStoriaEnum;
use Exception;
use Illuminate\Support\Facades\DB;
use BenSampo\Enum\Enum;

class StoriaController extends Controller
{
    //
    public function create(){
        $tipo_storia_list = TipoStoriaEnum::toSelectArray();
        return view('storia.create', [
            'tipo_storia_list' => $tipo_storia_list
        ]);
    } 

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required | string | max:511',
        ]);

        $storia = new Storia();
        $storia->nome = $request->get('nome');
        $storia->trama = $request->get('trama');
        $storia->stato = $request->get('stato');
        $storia->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $storia->save();
        return redirect(route('storia.index'))->with('success', 'La storia è stata salvata.');
    }

    public function storiaEliminaForm($id_storia) {
        return view('storia.elimina_form', [
            'id_storia' => $id_storia
        ]);
    }

    public function storiaEliminaExecute($id_storia) {
        try {
            DB::beginTransaction();
            RelStoriaAutoreRuolo::where('tstoria_id', '=', $id_storia)->delete();
            Storia::where('id', '=', $id_storia)->delete();
            DB::commit();
            return redirect(route('storia.index'))->with('success', 'Storia eliminata');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('storia.index'))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    }

    public function index(Request $request)
    {
               
        /* 
        se l'index è stato chiamato dal form di ricerca ed è stata inserita una stringa nel form 
        la recuperiamo dalla request e la inseriamo nella variabile $scope_search, altrimenti se la form è vuota
        o se l'index non è stato chiamato dal form di ricerca $scope_search contiene la stringa vuota
        Quando chiamiamo il metodo search su fumetti viene richiamato in automatico il metodo scopeSearch definito nel model
        */
        $scope_search = $request->has('scope_search') ? $request->get('scope_search') : ''; 
        $sort_by = 'nome';
        $order_by = 'asc';
        $per_page = 100;
        $storia = Storia::search($scope_search)->orderBy($sort_by, $order_by)->paginate($per_page);
        
        $tipo_storia_list = TipoStoriaEnum::toSelectArray();
        
        return view('storia.index', 
            [ 
              'storia' => $storia , 
              'tipo_storia_list' => $tipo_storia_list ,
              'scope_search' => $scope_search 
            ]);

    }

    public function edit ($id) {
        $storia = Storia::find($id);
        $tipo_storia_list = TipoStoriaEnum::toSelectArray();

        return view('storia.edit',
            [ 
              'storia' => $storia ,
              'tipo_storia_list' => $tipo_storia_list
            ]);
    } 

    public function update (Request $request, $id) {
        $request->validate([
            'nome' => 'required | string | max:511',
        ]);

        $storia = Storia::find($id);
        $storia->nome = $request->get('nome');
        $storia->trama = $request->get('trama');
        $storia->stato = $request->get('stato');
        $storia->data_lettura = \DateTime::createFromFormat('d-m-Y', $request->get('data_lettura'));
        $storia->save ();
        return redirect(route('storia.index'))->with('success', 'La storia è stata aggiornata.');
    }
}

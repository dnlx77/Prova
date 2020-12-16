<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Storia;
use App\RelStoriaAlbo;
use Exception;
use Illuminate\Support\Facades\DB;

class RelStoriaAlboController extends Controller
{
    //
    public function aggiungiStoria ($id_albo, Request $request) {
        $lista_storie = Storia::all();
       
        return view('rel_storia_albo.aggiungi_storia',
            [ 'lista_storie' => $lista_storie,
              'id_albo' => $id_albo  
            ]);
    } 

    public function update($id_albo, Request $request) {
        DB::beginTransaction();
        try {
            RelStoriaAlbo::where('storia_id', '=', $request->get('storia_id'))->where('albo_id', '=', $id_albo)->delete();
            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('albo.index', $id_albo))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }

        return redirect(route('albo.aggiungi_storia', $id_albo));
    }

    public function storeStoria (Request $request, $id_albo) {
        /*$request->validate([
            'autore' => 'required | max:511',
            'ruolo' => 'required | max:511',
        ]);*/
        //SALVARE UNA RIGA PER OGNI RUOLO
        DB::beginTransaction();
        try {
            //RelStoriaAlbo::where('storia_id', '=', $request->get('storia'))->where('albo_id', '=', $id_albo)->delete();
            
            $storia = $request->get('storia');
            $storia_albo = new RelStoriaAlbo();
            $storia_albo->albo_id = $id_albo;
            $storia_albo->storia_id = $storia;
            $storia_albo->save ();
            DB::commit();
            return redirect(route('albo.storia', $id_albo))->with('success', 'Storia aggiunta');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect(route('albo.index', $id_albo))->with('success', 'Si è verificato un problema. L\'operazione non è stata eseguita.');
        }
    } 

    public function index(Request $request, $id_albo)
    {
        $storie = DB::table('rel_storia_albo')->where('albo_id', '=', $id_albo)
        ->join('storia', 'storia.id', '=', 'rel_storia_albo.storia_id')
        ->get(['storia.id AS storia_id', 'storia.nome']);

        $albo = Albo::find($id_albo);

        return view('rel_storia_albo.storia_albo', [ 
            'albo' => $albo,
            'storie' => $storie
            ]);
    }
}

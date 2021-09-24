<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;

class RicercaController extends Controller
{
    public function index() {

        $lista_campi_ricerca = ['albi','autori'];

        return view('cerca.index', [
            'lista_campi_ricerca' => $lista_campi_ricerca
        ]);
    }

    public function search(Request $request) {

        $cerca_in = $request->has('cerca_in') ? $request->get('cerca_in') : '';
        $search = $request->has('titolo') ? $request->get('titolo') : ''; 
        
        $sort_by = 'numero';
        $order = 'asc';
        $per_page = 10;
        $albi = Albo::search($search)->orderBy($sort_by, $order)->paginate($per_page);
        $albi_view = 'cerca';

        return view('albo.index', 
            [ 'albi' => $albi,
              'cerca_in' => $cerca_in,  
              'search' => $search,
              'albi_view' => $albi_view
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Autore;

class RicercaController extends Controller
{
    public function index() {

        $lista_campi_ricerca = ['albi','autori'];
        $lista_campi_per_albo = ['numero','titolo'];
        $lista_campi_per_autore = ['nome', 'cognome', 'pseudonimo'];

        return view('cerca.index', [
            'lista_campi_ricerca' => $lista_campi_ricerca,
            'lista_campi_per_albo' => $lista_campi_per_albo,
            'lista_campi_per_autore' => $lista_campi_per_autore
        ]);
    }

    public function search(Request $request) {

        $cerca_in = $request->has('cerca_in') ? $request->get('cerca_in') : '';
        $search = $request->has('ricerca') ? $request->get('ricerca') : ''; 
        $cerca_per = $request->has('cerca_per') ? $request->get('cerca_per') : '';
        $ricerca_esatta = $request->has('esatta') ? $request->get('esatta') : 'false';
        $cerca_arr = array ($cerca_per, $search, $ricerca_esatta);

        switch ($cerca_in) {

        case "albi":
            $sort_by = 'numero';
            $order = 'asc';
            $per_page = 10;
            $albi = Albo::search($cerca_arr)->orderBy($sort_by, $order)->paginate($per_page);
            $albi_view = 'cerca';

            return view('albo.index', 
                [ 'albi' => $albi,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per, 
                'search' => $search,
                'ricerca_esatta' => $ricerca_esatta,
                'albi_view' => $albi_view,
                ]);

        case "autori":
            $sort_by = 'cognome';
            $order = 'asc';
            $per_page = 10;
            $autore = Autore::search($cerca_arr)->orderBy($sort_by, $order)->paginate($per_page);
            $autori_view = 'cerca';

            return view('autore.index', 
                [ 'autore' => $autore,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per,
                'search' => $search,
                'autori_view' => $autori_view
                ]);
        }
    }
}

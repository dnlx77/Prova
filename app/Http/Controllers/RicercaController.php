<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Autore;
use App\Collana;

class RicercaController extends Controller
{
    public function index() {

        $lista_campi_ricerca = ['albi','autori'];
        $lista_campi_per_albo = ['numero','titolo', 'collana'];
        $lista_campi_per_autore = ['nome', 'cognome', 'pseudonimo'];
        $lista_collane = Collana::all();

        return view('cerca.index', [
            'lista_campi_ricerca' => $lista_campi_ricerca,
            'lista_campi_per_albo' => $lista_campi_per_albo,
            'lista_campi_per_autore' => $lista_campi_per_autore,
            'lista_collane' => $lista_collane
        ]);
    }

    public function search(Request $request) {

        $cerca_in = $request->has('cerca_in') ? $request->get('cerca_in') : '';
        $cerca_per = $request->has('cerca_per') ? $request->get('cerca_per') : '';
        $search = $request->has('ricerca') ? $request->get('ricerca') : ''; 
        $tipo_ricerca = $request->has('tipo_ricerca') ? $request->get('tipo_ricerca') : '';
        $data_pub_iniziale = $request->has('data_pub_iniziale') ? $request->get('data_pub_iniziale') : '';
        $data_pub_finale = $request->has('data_pub_finale') ? $request->get('data_pub_finale') : '';

        switch ($cerca_in) {

        case "albi":
            $sort_by = 'numero';
            $order = 'asc';
            $per_page = 10;
            if ($cerca_per != "collana")
                $albi = Albo::AlboSearch($cerca_per, $search, $tipo_ricerca, $data_pub_iniziale, $data_pub_finale)->orderBy($sort_by, $order)->paginate($per_page);
            else {
                $collana = Collana::find($search);
                $albi = $collana->albi($data_pub_iniziale, $data_pub_finale)->orderBy('numero', 'asc')->paginate($per_page);
            }
            
            $albi_view = 'cerca';

            return view('albo.index', 
                [ 'albi' => $albi,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per, 
                'search' => $search,
                'ricerca_esatta' => $tipo_ricerca,
                'data_pub_iniziale' => $data_pub_iniziale,
                'data_pub_finale' => $data_pub_finale,
                'albi_view' => $albi_view
                ]);

        case "autori":
            $sort_by = 'cognome';
            $order = 'asc';
            $per_page = 10;
            $autore = Autore::AutoreSearch($cerca_per, $search, $tipo_ricerca)->orderBy($sort_by, $order)->paginate($per_page);
            $autori_view = 'cerca';

            return view('autore.index', 
                [ 'autore' => $autore,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per,
                'search' => $search,
                'ricerca_esatta' => $tipo_ricerca,
                'autori_view' => $autori_view
                ]);
        }
    }
}

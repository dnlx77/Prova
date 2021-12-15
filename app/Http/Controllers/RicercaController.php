<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Autore;
use App\Collana;
use App\Storia;

class RicercaController extends Controller
{
    public function index() {

        $lista_campi_ricerca = ['albi','autori','storie'];
        $lista_campi_per_albo = ['numero', 'titolo', 'collana', 'tutto'];
        $lista_campi_per_autore = ['nome', 'cognome', 'pseudonimo', 'tutto'];
        $lista_campi_per_storia = ['nome', 'autore', 'tutto'];
        $lista_collane = Collana::all();
        $lista_autori = Autore::all();

        return view('cerca.index', [
            'lista_campi_ricerca' => $lista_campi_ricerca,
            'lista_campi_per_albo' => $lista_campi_per_albo,
            'lista_campi_per_autore' => $lista_campi_per_autore,
            'lista_campi_per_storia' => $lista_campi_per_storia,
            'lista_collane' => $lista_collane,
            'lista_autori' => $lista_autori
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
            switch ($cerca_per) {
            
            case "collana":
                $collana = Collana::find($search);
                $albi = $collana->albi($data_pub_iniziale, $data_pub_finale)->orderBy($sort_by, $order)->paginate($per_page);
                break;

            default:
                $albi = Albo::AlboSearch($cerca_per, $search, $tipo_ricerca, $data_pub_iniziale, $data_pub_finale)->orderBy($sort_by, $order)->paginate($per_page);
                break;
            }   
            
            return view('albo.index', 
                [ 'albi' => $albi,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per, 
                'search' => $search,
                'ricerca_esatta' => $tipo_ricerca,
                'data_pub_iniziale' => $data_pub_iniziale,
                'data_pub_finale' => $data_pub_finale
                ]);

        case "storie":
            $sort_by = 'nome';
            $order = 'asc';
            $per_page =10;
            $storie = Storia::StoriaSearch($cerca_per, $search, $tipo_ricerca, $data_pub_iniziale, $data_pub_finale)->orderBy($sort_by, $order)->paginate($per_page);

            return view('storia.index', 
                [ 'storie' => $storie,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per,
                'search' => $search,
                'ricerca_esatta' => $tipo_ricerca,
                'data_pub_iniziale' => $data_pub_iniziale,
                'data_pub_finale' => $data_pub_finale
                ]);

        case "autori":
            $sort_by = 'cognome';
            $order = 'asc';
            $per_page = 10;
            $autore = Autore::AutoreSearch($cerca_per, $search, $tipo_ricerca)->orderBy($sort_by, $order)->paginate($per_page);

            return view('autore.index', 
                [ 'autore' => $autore,
                'cerca_in' => $cerca_in,
                'cerca_per' => $cerca_per,
                'search' => $search,
                'tipo_ricerca' => $tipo_ricerca
                ]);
        }
    }
}

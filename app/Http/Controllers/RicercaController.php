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

        $search = $request->get('titolo');
        $sort_by = 'created_at';
        $order = 'desc';
        $per_page = 10;
        $albi = Albo::search($search)->orderBy($sort_by, $order)->paginate($per_page);

        return view('albo.index', 
            [ 'albi' => $albi,
              'search' => $search ]
            );
    }
}

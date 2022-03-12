<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Autore;
use App\Storia;
use App\Editore;
use App\Collana;

class StatisticheController extends Controller
{
    public function index() {

        $num_albi = Albo::all()->count();
        $num_autori = Autore::all()->count();
        $num_storie = Storia::all()->count();
        $num_editori = Editore::all()->count();
        $num_collane = Collana::all()->count();
        $num_storie_lette = Storia::StorieLette()->count();
        $num_albi_letti = Albo::AlbiLetti()->count();

        $statistiche = ['albi' => $num_albi,
        'albi letti' => $num_albi_letti, 
        'storie' => $num_storie,
        'storie lette' => $num_storie_lette,
        'autori' => $num_autori,
        'editori' => $num_editori, 
        'collane' => $num_collane 
        ];
        
        return view('statistiche.index', [
            'statistiche' => $statistiche,
        ]);
    }
}

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

        $statistiche = ['albi' => $num_albi, 'autori' => $num_autori, 'storie' => $num_storie, 'editori' => $num_editori, 'collane' => $num_collane];
        
        return view('statistiche.index', [
            'statistiche' => $statistiche,
        ]);
    }
}

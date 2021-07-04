<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;
use App\Autore;
use App\Storia;

class StatisticheController extends Controller
{
    public function index() {

        $num_albi = Albo::all()->count();
        $num_autori = Autore::all()->count();
        $num_storie = Storia::all()->count();

        return view('statistiche.index', [
            'num_albi' => $num_albi,
            'num_autori' => $num_autori,
            'num_storie' => $num_storie,
        ]);
    }
}

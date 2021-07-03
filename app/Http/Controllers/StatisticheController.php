<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albo;

class StatisticheController extends Controller
{
    public function index() {
        $num_albi = Albo::all()->count();
        return view('statistiche.index', [
            'num_albi' => $num_albi,
        ]);
    }
}

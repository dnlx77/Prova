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
        //$num_albi_pubblicati_anno = Albo::NumAlbiPubblicatiAnno('2020');
        //$num_albi_pubblicati_anno_mese = Albo::NumAlbiPubblicatiMeseAnno('03','2020');

        $statistiche = ['albi' => $num_albi,
        'albi letti' => $num_albi_letti, 
        'storie' => $num_storie,
        'storie lette' => $num_storie_lette,
        'autori' => $num_autori,
        'editori' => $num_editori, 
        'collane' => $num_collane,
        //'albi anno' => $num_albi_pubblicati_anno,
        //'albi mese e anno' => $num_albi_pubblicati_anno_mese
        ];
        
        return view('statistiche.index', [
            'statistiche' => $statistiche,
        ]);
    }

    /* Dato l'anno ricevuto per parametro calcola il numero di albi pubblicati in ogni mese dell'anno */

    public function albiPerMese($anno) {
        $primo_anno = date("Y", strtotime(Albo::min('data_pubblicazione')));
        $ultimo_anno = date("Y", strtotime(Albo::max('data_pubblicazione')));
        $num_albi_anno = Albo::AlbiPubblicatiAnno($anno)->count();

        $num_albi_per_mese = [];
        for ($i=1; $i<13; $i++) 
            $num_albi_per_mese[date('F', mktime(0, 0, 0, $i, 1))] = Albo::AlbiPubblicatiMeseAnno($i,$anno)->count();
            
        return view('statistiche.albi_per_mese', [
            'num_albi_per_mese' => $num_albi_per_mese,
            'primo_anno' => $primo_anno,
            'ultimo_anno' => $ultimo_anno,
            'num_albi_anno' => $num_albi_anno
        ]);
    }

    public function albiPerAnno() {
        $primo_anno = date("Y", strtotime(Albo::min('data_pubblicazione')));
        $ultimo_anno = date("Y", strtotime(Albo::max('data_pubblicazione')));

        $num_albi_per_anno = [];
        for($i=$primo_anno; $i<=$ultimo_anno; $i++)
            $num_albi_per_anno[$i] = Albo::AlbiPubblicatiAnno($i)->count();

            return view('statistiche.albi_per_anno', [
                'primo_anno' => $primo_anno,
                'ultimo_anno' => $ultimo_anno,
                'num_albi_per_anno' => $num_albi_per_anno
            ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    //
    protected $table = 'autore';

    public function scopeAutoreSearch($query, $cerca_per, $cerca, $tipo_ricerca) {
        if(!empty($cerca_per) && $cerca_per != 'tutto') {
            switch ($tipo_ricerca) {
                case 'iniziaPer':
                    $query->where($cerca_per, 'LIKE', "{$cerca}%");
                    break;
                case 'contiene':
                    $query->where($cerca_per, 'LIKE', "%{$cerca}%");
                    break;
                case 'esatta':
                    $query->where($cerca_per, '=', $cerca);
                    break;
            }
        }
        return $query;
    }

    public function storie($data_let_iniziale, $data_let_finale, $stato_lettura) {
        $query = $this->belongsToMany(Storia::class, 'rel_storia_autore_ruolo');

        if (!empty($data_let_iniziale))
                $query->whereDate('data_lettura', '>=', $data_let_iniziale);

        if(!empty($data_let_finale)) 
                $query->whereDate('data_lettura', '<=', $data_let_finale);

        switch ($stato_lettura) {
            case 'leggere':
                $query->where('data_lettura', '=', null);
                break;
            case 'letti':
                $query->where('data_lettura', '<>', null);
                break;
            default:
                break;
        }

        return $query;
    }
}

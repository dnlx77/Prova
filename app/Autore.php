<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    //
    protected $table = 'autore';

    public function scopeAutoreSearch($query, $cerca_per, $cerca, $tipo_ricerca) {
        if(!empty($cerca_per)) {
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
}

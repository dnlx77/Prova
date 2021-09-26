<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    //
    protected $table = 'autore';

    public function scopeAutoreSearch($query, $cerca_per, $cerca, $esatta) {
        if(!empty($cerca_per)) {
            if ($esatta <> 'true')
			    $query->where($cerca_per, 'LIKE', "%{$cerca}%");
            else
                $query->where($cerca_per, '=', $cerca);
        }
        return $query;
    }
}

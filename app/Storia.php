<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storia extends Model
{
    //
    protected $table = 'storia';

    /*I local scope ci permettono di definire una serie di vincoli riusabili
    per far ciò si fa precedre la keyword scope al nome della funzione poi la funzione sarà richiamabile soltanto
    con il nome senza scope
    $query contiene instanze della classe Fumetti il cui titolo contiene la stringa $string
    Perché usiamo 2 parametri?
    */
    public function scopeSearch($query, $string) {
        if(!empty($string)){
			$query->where('nome', 'LIKE', "%{$string}%");
        }
        return $query;
    }
}

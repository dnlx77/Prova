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
    $query contiene instanze della classe Storia il cui titolo contiene la stringa $string
    Il secondo parametro e l'argomento che passiamo alla funzione
    */
    public function scopeSearch($query, $string) {
        if(!empty($string)){
			$query->where('nome', 'LIKE', "%{$string}%");
        }
        return $query;
    }

    public function albi() {
        return $this->belongsToMany(Albo::class, 'rel_storia_albo');
    }
}

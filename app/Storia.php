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

    public function scopeStoriaSearch($query, $cerca_per, $cerca, $tipo_ricerca, $data_pub_iniziale, $data_pub_finale) {
        if(!empty($cerca_per)) {
            
            if ($cerca_per != 'tutto') {
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

            if (!empty($data_pub_iniziale))
                $query->whereDate('data_lettura', '>=', $data_pub_iniziale);

            if(!empty($data_pub_finale)) 
                $query->whereDate('data_lettura', '<=', $data_pub_finale);
        }

        return $query;
    }

    public function albi() {
        return $this->belongsToMany(Albo::class, 'rel_storia_albo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    //
    protected $table = 'autore';

    public function scopeSearch($query, $string) {
        if(!empty($string)){
			$query->where($string[0], 'LIKE', "%{$string[1]}%");
        }
        return $query;
    }
}

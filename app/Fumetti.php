<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fumetti extends Model
{
    //
    protected $table = 'fumetti';

    public function scopeSearch($query, $string) {
        if(!empty($string)){
			$query->where('titolo', 'LIKE', "%{$string}%");
        }
        return $query;
    }
}

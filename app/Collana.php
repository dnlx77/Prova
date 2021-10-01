<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collana extends Model
{
    //
    protected $table ='collana';

    public function albi($data_pub_iniziale, $data_pub_finale) {
        $query = $this->hasMany(Albo::class);

        if (!empty($data_pub_iniziale))
            $query->whereDate('data_pubblicazione', '>=', $data_pub_iniziale);

        if(!empty($data_pub_finale)) 
            $query->whereDate('data_pubblicazione', '<=', $data_pub_finale);
            
        return $query;
    }

}

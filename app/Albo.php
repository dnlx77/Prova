<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albo extends Model
{
    //
    protected $table = 'albo';

    public function collana() {
        return $this->hasOne(Collana::class, 'collana_id');

    }

    public function editore() {
        return $this->hasOne(Editore::class, 'editore_id');

    }
}

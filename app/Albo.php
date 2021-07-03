<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albo extends Model
{
    //
    protected $table = 'albo';

    public function collana() {
        return $this->belongsTo(Collana::class, 'collana_id');
    }

    public function editore() {
        return $this->belongsTo(Editore::class, 'editore_id');
    }

    public function storie() {
        return $this->belongsToMany(Storia::class, 'rel_storia_albo');
    }

    public function autoriCopertina() {
        return $this->belongsToMany(Autore::class, 'rel_albo_autoricopertina');
    }

    public function scopeGetAlbo ($query, $albo_id) {
        return $query->where('id',$albo_id);
    }

    public function scopeNumAlbiInCollana ($query, $collana_id) {
        return $query->where('collana_id', '=', $collana_id)->count();
    }

    public function scopeNumAlbi ($query) {
        return $query->where('id', '=', '*')->count();
    }
}

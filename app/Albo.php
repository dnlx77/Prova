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

    public function scopeAlboSearch($query, $cerca_per, $cerca, $tipo_ricerca, $data_pub_iniziale, $data_pub_finale) {
        if(!empty($cerca_per)) {
            if ($data_pub_iniziale <> '' && $data_pub_finale <> '') {
                switch ($tipo_ricerca) {
                    case 'iniziaPer':
                        $query->where($cerca_per, 'LIKE', "{$cerca}%")->whereDate('data_pubblicazione', '>', $data_pub_iniziale)->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                    case 'contiene':
                        $query->where($cerca_per, 'LIKE', "%{$cerca}%")->whereDate('data_pubblicazione', '>', $data_pub_iniziale)->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                    case 'esatta':
                        $query->where($cerca_per, '=', $cerca)->whereDate('data_pubblicazione', '>', $data_pub_iniziale)->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                }
            } elseif ($data_pub_iniziale == '' && $data_pub_finale <> '') {
                switch ($tipo_ricerca) {
                    case 'iniziaPer':
                        $query->where($cerca_per, 'LIKE', "{$cerca}%")->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                    case 'contiene':
                        $query->where($cerca_per, 'LIKE', "%{$cerca}%")->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                    case 'esatta':
                        $query->where($cerca_per, '=', $cerca)->whereDate('data_pubblicazione', '<', $data_pub_finale);
                        break;
                }
            } elseif ($data_pub_iniziale <> '' && $data_pub_finale == '') {
                switch ($tipo_ricerca) {
                    case 'iniziaPer':
                        $query->where($cerca_per, 'LIKE', "{$cerca}%")->whereDate('data_pubblicazione', '>', $data_pub_iniziale);
                        break;
                    case 'contiene':
                        $query->where($cerca_per, 'LIKE', "%{$cerca}%")->whereDate('data_pubblicazione', '>', $data_pub_iniziale);
                        break;
                    case 'esatta':
                        $query->where($cerca_per, '=', $cerca)->whereDate('data_pubblicazione', '>', $data_pub_iniziale);
                        break;
                }
            } else {
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
        }
        return $query;
    }
}

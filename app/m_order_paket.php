<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_order_paket extends Model
{
     protected $table = 'order_art';
    protected $fillable= ['id_art', 'id_master','id_paket','id_status_penerimaan','bank'];
    public function masters()
    {
        return $this->hasOne(master::class);
    }
     public function paket{
        return $this->hasOne(paket_pekerjaan::class);
    }
}

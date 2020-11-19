<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class m_order_paket extends Model
{
	use SoftDeletes;
    protected $date = ['deleted_at'];
     protected $table = 'order_art';
    protected $fillable = ['id_art', 'id_master','id_paket','id_status_penerimaan','id_bank'];

    public function masters()
    {
        return $this->hasOne(master::class);
    }

     public function paket(){
        return $this->hasOne(paket_pekerjaan::class);
    }
}

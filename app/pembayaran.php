<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable= ['bukti_transfer', 'id_statuspembayaran', 'day_start','day_over', 'kode_pembayaran','id_order'];
}

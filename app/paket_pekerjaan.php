<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paket_pekerjaan extends Model
{
  protected $table = 'paket_pekerjaan';
  protected $fillable= ['foto_paket', 'nama_paket', 'deskripsi_paket', 'harga_paket'];

  public function getPhoto(){
    if(!$this->foto_paket){
      return asset('/images/img_2.jpg');
    }
    return asset('images/'.$this->foto_paket);
  }
  
}

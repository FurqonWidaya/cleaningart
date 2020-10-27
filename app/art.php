<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class art extends Model
{
    protected $table = 'art';
    protected $fillable= [ 'foto', 'nama', 'nohp', 'tanggallahir', 'kecamatan', 'alamat',
    'kodepos', 'status', 'deskripsi', 'user_id','username', 'password' ];


    public function getPhoto(){
    	if(!$this->foto){
    		return asset('images/deafult.png');
    	}
    	return asset('images/'.$this->foto);
    }
}

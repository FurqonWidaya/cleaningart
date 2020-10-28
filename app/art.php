<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
class art extends Model
{
    protected $table = 'art';
    protected $fillable= [ 'user_id', 'foto', 'nama', 'nohp', 'tanggallahir', 'kecamatan', 'alamat',
    'kodepos', 'status', 'deskripsi','username', 'password' ];
//'user_id'

    public function getPhoto(){
    	if(!$this->foto){
    		return asset('images/deafult.png');
    	}
    	return asset('images/'.$this->foto);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

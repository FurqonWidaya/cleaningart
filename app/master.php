<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
class master extends Model
{
    protected $table = 'master';
    protected $fillable= [ 'foto', 'nama', 'nohp', 'email', 'kecamatan', 'alamat',
    'kodepos','username', 'password' ];


    public function getPhoto(){
        if(!$this->foto){
            return asset('images/default.png');
        }
        return asset('images/'.$this->foto);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

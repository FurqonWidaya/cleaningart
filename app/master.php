<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class master extends Model
{   
   // use Notifiable;

    protected $table = 'master';
    protected $fillable= [ 'foto', 'name', 'nohp', 'email', 'kecamatan', 'alamat',
    'kodepos','username', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];
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
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

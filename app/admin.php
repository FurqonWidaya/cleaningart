<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
class admin extends User
{
    protected $table = 'admin';
    protected $guard = 'admin';
    protected $fillable= [ 'name', 'email', 'username', 'password', 'role', 'user_id'];


    // public function getPhoto(){
    //     if(!$this->foto){
    //         return asset('images/default.png');
    //     }
    //     return asset('images/'.$this->foto);
    // }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
}

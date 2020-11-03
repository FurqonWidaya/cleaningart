<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
         'email', 'username', 'password', 'role','active_token',
    ];
//'name',
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array

     */
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function master()
    {
        return $this->hasOne(master::class);
    }
    public function masters()
    {
        return $this->belongsTo(master::class);
    }

    public function art()
    {
        return $this->hasOne(art::class);
    }
    
}

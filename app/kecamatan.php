<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    public $timestamps = false;
    protected $table = 'kecamatan';
    protected $fillable = ['kecamatan','user_id'];

    public function user()
        {
             return $this->hasOne(User::class);
        }
}

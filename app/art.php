<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class art extends Model
{
    protected $table = 'art';
    protected $fillable= ['foto', 'nama', 'nohp', 'tanggallahir', 'kecamatan', 'alamat',
    'kodepos', 'status', 'deskripsi', 'username', 'password'
    ];
}

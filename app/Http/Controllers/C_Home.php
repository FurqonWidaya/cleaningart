<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_Home extends Controller
{
    public function home (){
       return view ('master.homed');
    }
}

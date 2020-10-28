<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
     public function master (){
       return view ('master.homed');
    }
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function error()
    {
    	return view('master.404');
    }

}

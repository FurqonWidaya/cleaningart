<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
     public function maid (){
       return view ('art.home');
    }
     public function error()
    {
    	return view('art.404');
    }
}

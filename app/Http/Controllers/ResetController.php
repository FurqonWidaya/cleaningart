<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User; 
use App\Events\ForgotActivationEmail; 
use Auth;
use App\Http\Controllers\ResetController;
use Mail;
use App\Providers\RouteServiceProvider;
class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ResetsPasswords;
    
    protected $redirectTo = '/home';
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'email'=>'required|email|exists:users',
        'password' => 'required|min:5',
     ]);
        
     $user = User::whereEmail($email)->first();   
     //dd($user);
     if($user->email !== null){
        return redirect()->back()->with('error', 'email tidak valid');
             }
             else{
                $user->update([
                    'password' => bcrypt($request['password']),
                    'active_token' => null,
                    
                ]);
                return redirect('/login')->with('sukses','password berhasil diperbarui');
             }
        }

}

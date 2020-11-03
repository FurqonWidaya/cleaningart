<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    //midleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    //cari art
    public function dataart(Request $request){
        if ($request->has('cari')){
            $data_art = \App\art::where('name', 'LIKE', '%' 
            .$request->cari. '%')->paginate(10);
        }else{
            $data_art = \App\art::paginate(10);
        }
        return view('admin.dataart',['data_art' => $data_art]);
    }

    //liat data master
    public function datamaster(Request $request){
         if ($request->has('cari')){
            $data_master = \App\master::where('name', 'LIKE', '%' 
            .$request->cari. '%')->get();
        }else{
            $data_master = \App\master::all();
        }
        return view('admin.datamaster',['data_master' => $data_master]);
    }
    
    //liat profil data master
      public function profilmaster($id){
        $master = \App\master::find($id); 
        $user = \App\User::find($id);
        return view('admin.profilemaster', ['master' => $master], ['user' => $user]);
    }

    //buat data art
    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4',
            'username'=>'required|min:5|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:5',
            'foto' => 'mimes:jpg,png,jpeg',
            'tanggallahir' => 'date|after:1960-12-12|before:2001-12-12|nullable',
            'nohp'=>'required|min:11|max:13|regex:/(08)[0-9]{9}/',
            'kodepos' => 'numeric|min:4|nullable'
        ]);
        $user = \App\user::create($request->all());
        $user->role= $request->role;
        $user->username= $request->username;
        $user->email=$request->email;
        $user->password = bcrypt($user->password);
        $user->remember_token = str_random(60);
        $user->save();
        $request->request->add(['user_id'=> $user->id]);
        $art = \App\art::create($request->all());
         if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->save();
        }
        return redirect('/dataart')->with('sukses','data berhasil ditambahkan');
    }

    //edit data art
    public function edit($id){
        $art = \App\art::find($id);
        return view('admin.editart', ['art' => $art]);
    }
    
    //update dataart
    public function update(Request $request, $id){
        //dd($request->all());
         $art = \App\art::find($id);
         $art->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->save($request->all());
        }
        return redirect('/dataart')->with('sukses', 'data berhasil diubah');
    }
    
    //liat profil data art
    public function profilart($id){
        $art = \App\art::find($id);
        return view('admin.profileart', ['art' => $art]);
    }
     
    //lom fungsi
    public function decrypt()
    {
        $decrypt = crypt::decryptString($user->password);
    }

}
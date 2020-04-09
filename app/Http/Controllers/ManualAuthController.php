<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Masyarakat;
use App\Models\Petugas;
class ManualAuthController extends Controller
{
    public function register()
    {
        return view('auth.mregister');
    }

    public function registerAdmin()
    {
        return view('auth.registeradmin');
    }
    public function registerPetugas()
    {
        return view('auth.registerpetugas');
    }
    public function profile()
    {
        $user = Auth::user();

        if($user->level != 'user'){
            $users = Petugas::where('username', $user->username)->first();
        }else{
            $users =  Masyarakat::where('username', $user->username)->first();
        }
        return view('profile', ['user' => $user, 'users' => $users]);
    }
    public function ubahProfile(Request $r)
    {

        $validate = $r->validate([
           'nama' => 'required | max:35',
           'username' => 'required'
        ]);
        
        if(count(User::where('username', $r->username)->where('id', '!=', Auth::user()->id)->get()) >= 1){
            $validate = $r->validate([
                'username' => 'unique:users'
             ]); 
        }

        
        $user = Auth::user();
        $user2 = User::where('username', $user->username)->first();
        $user = User::find($user->id);
        
        if($user->level != 'user'){
            $validate = $r->validate([
                'telp' => 'required | size:13',
             ]);
            $user = Petugas::where('username', $user->username)->first();
            $user->nama_petugas = $r->nama;
            $user->telp = $r->telp;
            $user->username = $r->username;
            $user->save();
        }else{
            
            $user = Masyarakat::where('username', $user->username)->first();
            $user->username = $r->username;
            $user->nama = $r->nama;
            $user->save();
        }
        
        
        $user2->username = $user->username;
        $user2->save();
        
        
        return back()->with('success', "Berhasil mengubah profile");
    }
}

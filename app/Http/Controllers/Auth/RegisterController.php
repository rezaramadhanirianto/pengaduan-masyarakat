<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Masyarakat;
use App\Models\Petugas;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['level'] == '0'){
            return Validator::make($data, [ 
                'nik' => ['required', 'size:16', 'unique:masyarakat'],
                'nama' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:25', 'unique:users'],
                'password' => ['required', 'string', 'confirmed'],
            ]);
        } else if($data['level'] == '1'){
            return Validator::make($data, [ 
                'telp' => ['required', 'size:13'],
                'nama' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:25', 'unique:users'],
                'password' => ['required', 'string', 'confirmed'],
            ]);
        }else if($data['level'] == '2'){
            return Validator::make($data, [ 
                'telp' => ['required', 'size:13'],
                'nama' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:25', 'unique:users'],
                'password' => ['required', 'string', 'confirmed'],
            ]);
        }else{
            return back()->with('failed', "Anda tidak memiliki akses");
        }
    }
    protected function create(array $data)
    {
        if($data['level'] == '0'){
            Masyarakat::create([
                'nama' => $data['nama'],
                'username' => $data['username'],
                'nik' => $data['nik'],
                'password' => Hash::make($data['password']),
            ]);
            $user = 'user';
        }else if($data['level'] == '1'){
            
            Petugas::create([
                'nama_petugas' => $data['nama'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'telp' => $data['telp'],
                
            ]);
            $user = 'petugas';
        }else if ($data['level'] == '2'){
            Petugas::create([
                'nama_petugas' => $data['nama'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'telp' => $data['telp'],
            ]);
            $user = 'admin';
        }
        
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => $user,
            'verifikasi' => '0'
        ]);
        
    }
}

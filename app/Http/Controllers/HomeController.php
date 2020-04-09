<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            if(Auth::user()->level == 'user'){
                return view('masyarakat.home');
            }else if(Auth::user()->verifikasi != '1'){
                return redirect()->route('verifikasi');
            }else{
                if(Auth::user()->level == 'admin'){
                    return redirect()->route('admin');
                }else if(Auth::user()->level == 'petugas'){
                    return redirect()->route('petugas');
                }

            }
        
    }
}

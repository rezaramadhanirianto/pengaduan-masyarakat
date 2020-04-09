<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use PDF;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class AdminController extends Controller
{
    public function index()
    {  
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.index', ['users' => $users]);
    }
    public function admin(Request $r)
    {
        
        $user = User::find($r->id);
        $user->verifikasi = $r->verifikasi;
        $user->save();
        return back()->with('success', "Berhasil Mengubah");
    }
    public function edit($id)
    {
        $user = User::find($id);
        
        if($user->level != 'user'){
            return Petugas::where('username', $user->username)->first();
        }else{
            return Masyarakat::where('username', $user->username)->first();
        }
    }
    public function update(Request $r)
    {
        $user = User::where('username', $r->oldusername)->first();
        if(count(User::where('username', $r->username)->where('username','!=', $user->username)->get()) >= 1){
            return back()->with('failed', 'Username sudah terdaftar');
        }else{
            $users = User::where('username', $user->username)->first();
            if($user->level == 'user'){
                $masyarakat = Masyarakat::where('username', $user->username)->first();
                $users->username = $r->username;
                $users->save();
                $masyarakat->username = $r->username;
                $masyarakat->nama = $r->nama;
                $masyarakat->save();
            }else{
                $petugas = Petugas::where('username', $user->username)->first();
                $petugas->nama_petugas = $r->nama;
                $petugas->username = $r->username;
                $petugas->telp = $r->telp;
                $petugas->save();
            }
        }
        return back()->with('success', "Berhasil Mengubah");
    }
    public function report()
    {
        return view('admin.report');
    }
    public function filterReport(Request $request)
    {
        $pengaduans = Pengaduan::whereBetween("tgl_pengaduan", [$request->date1, $request->date2])->get();  
        $pdf = PDF::loadView('admin.pdf', ['pengaduans' => $pengaduans]);
        return $pdf->download('laporan_' . $request->date1 . '_' . $request->date2);
        // return view('admin.pdf',['pengaduans' => $pengaduans]);

    }
    public function hapus($id)
    {
        $user = User::find($id);
        if($user->level == 'user'){
            $masyarakat = Masyarakat::where('username', $user->username)->first();
        }else{
            $masyarakat = Petugas::where('username', $user->username)->first();
        }
        $masyarakat->delete();
        $user->delete();
        return back()->with('success', 'Berhasil');

    }
}

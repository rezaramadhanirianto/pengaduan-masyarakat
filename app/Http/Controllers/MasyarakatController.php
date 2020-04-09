<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use \Carbon\Carbon;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use Auth;

class MasyarakatController extends Controller
{
    public function pengaduan(Request $request)
    {

        $validate = $request->validate([
            'laporan' => 'required',
            'foto' => 'required',
        ]);
        
        $username =  Auth::user()->username;
        $user = Masyarakat::where('username', $username)->first();
        $file = $request->foto;
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->move('upload', $nama_file);
        Pengaduan::create([
            'tgl_pengaduan' => date(Carbon::now()),
            'nik' => $user->nik,
            'isi_laporan' => $request->laporan,
            'status' => '0',
            'foto' => $nama_file,
        ]);

        return back()->with('success', 'Berhasil Upload');
    }
    public function history()
    {
        $currentuser = Auth::user();
        $user = Masyarakat::where('username', $currentuser->username)->first();
        $pengaduan = Pengaduan::where('nik', $user->nik)->paginate(5);
        return view('masyarakat.history', ['pengaduan' => $pengaduan]);
    }
    public function lihathistory($id)
    {
        $pengaduan = Pengaduan::find($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $pengaduan->id)->first();
        return view('masyarakat.lihatHistory', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan]);
    }
}

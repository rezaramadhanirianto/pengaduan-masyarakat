<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use \Carbon\Carbon;
use Auth;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.index', ['pengaduan' => Pengaduan::all()]);
    }
    public function verifikasi()
    {
        return view('verifikasi');
    }
    public function lihatPengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('petugas.lihatPengaduan', ['pengaduan' => $pengaduan]);
    }
    public function tambahTanggapan(Request $r)
    {
        $pengaduan = Pengaduan::find($r->id);
        $pengaduan->status = $r->status;
        $pengaduan->save();
        Tanggapan::create([
            'id_pengaduan' => $pengaduan->id,
            'tgl_tanggapan' => date(Carbon::now()),
            'tanggapan' => $r->tanggapan,
            'id_petugas' => Auth::user()->id,
        ]);
        return redirect()->route('petugas')->with('success', "Berhasil Menambahkan tanggapan");
    }
}

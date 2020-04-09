<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Pengaduan extends Model
{
    protected $table = "pengaduan";
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo('App\Models\Masyarakat', 'nik', 'nik');
    }
    public function tanggapan()
    {
        return $this->hasOne('App\Models\Tanggapan', 'id_pengaduan');
    }
    
}

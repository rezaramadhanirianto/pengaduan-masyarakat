<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapan";
    protected $guarded = ['id'];

    public function petugas()
    {
        return $this->belongsTo('App\Models\Petugas', 'id_petugas');
    }
}

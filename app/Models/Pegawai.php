<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public $table = "t_pegawai";
    public $guarded = [];

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    public function provinsi() {
        return $this->belongsTo(Provinsi::class);
    }
}

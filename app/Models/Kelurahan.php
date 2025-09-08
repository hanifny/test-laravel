<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    public $table = "t_kelurahan";
    public $guarded = [];

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }
}

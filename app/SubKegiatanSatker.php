<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKegiatanSatker extends Model
{
    //
    protected $table = 'sub_kegiatan_satker';

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}

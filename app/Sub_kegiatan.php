<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kegiatan;
use App\Rincian;

class Sub_kegiatan extends Model
{
    //
    protected $table= 'sub_kegiatan';

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function rincian()
    {
        return $this->hasMany(Rincian::class);
    }
}

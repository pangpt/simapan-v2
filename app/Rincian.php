<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sub_kegiatan;

class Rincian extends Model
{
    //
    protected $table = 'rincian';

    public function sub_kegiatan()
    {
        return $this->belongsTo(Sub_kegiatan::class);
    }
}

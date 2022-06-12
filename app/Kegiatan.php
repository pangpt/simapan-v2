<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcat;
use App\Sub_kegiatan;

class Kegiatan extends Model
{
    //
    protected $table = 'kegiatan';

    public function subcat()
    {
        return $this->belongsTo(Subcat::class);
    }

    public function sub_kegiatan()
    {
        return $this->hasMany(Sub_kegiatan::class);
    }
}

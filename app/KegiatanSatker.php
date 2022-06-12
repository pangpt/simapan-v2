<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanSatker extends Model
{
    //
    protected $table = "kegiatan_satker";

    public function program_satker()
    {
        return $this->belongsTo(ProgramSatker::class);
    }
}

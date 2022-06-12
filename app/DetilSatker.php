<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilSatker extends Model
{
    //
    protected $table = 'detil_satker';

    public function rincian_satker()
    {
        return $this->belongsTo(RincianSatker::class);
    }
}

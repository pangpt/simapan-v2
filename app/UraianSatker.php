<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UraianSatker extends Model
{
    //
    protected $table = 'uraian_satker';

    public function detil_satker()
    {
        return $this->belongsTo(DetilSatker::class);
    }
}

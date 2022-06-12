<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Invoice;

class Activity extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'cat_id', 'kode_kegiatan', 'nama_kegiatan', 'harga_satuan', 'jumlah'
    ];

    // public function invoice()
    // {
    //     return $this->hasOne(Invoice::class);
    // }
}

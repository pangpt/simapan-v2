<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Submenu;
use App\Subcat;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'kode_submenu', 'kode_kategori', 'nama_kategori',
    ];

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }

    public function subcat()
    {
        return $this->hasMany(Subcat::class);
    }

}

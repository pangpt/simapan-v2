<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Kegiatan;

class Subcat extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}

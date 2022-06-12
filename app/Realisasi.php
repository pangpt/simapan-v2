<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    //
    protected $fillable = ['kode', 'uraian', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcat()
    {
        return $this->belongsTo(Subcat::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function sub_kegiatan()
    {
        return $this->belongsTo(Sub_kegiatan::class);
    }

    public function rincian()
    {
        return $this->belongsTo(Rincian::class);
    }

}

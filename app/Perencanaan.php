<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;
use App\Submenu;
use App\Category;
use App\Subcat;
use App\Kegiatan;

class Perencanaan extends Model
{
    //
    protected $table = 'perencanaan';

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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;
use App\Category;

class Submenu extends Model
{
    //
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function cat()
    {
        return $this->hasMany(Category::class);
    }
}

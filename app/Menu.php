<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Submenu;

class Menu extends Model
{
    //
    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }
}

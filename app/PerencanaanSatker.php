<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerencanaanSatker extends Model
{
    //
    protected $table ='perencanaan_satker';

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function program_satker()
    {
        return $this->belongsTo(ProgramSatker::class);
    }

    public function kegiatan_satker()
    {
        return $this->belongsTo(KegiatanSatker::class);
    }

    public function sub_kegiatan_satker()
    {
        return $this->belongsTo(SubKegiatanSatker::class);
    }

    public function menu_satker()
    {
        return $this->belongsTo(MenuSatker::class);
    }

    public function rincian_satker()
    {
        return $this->belongsTo(RincianSatker::class);
    }

    public function detil_satker()
    {
        return $this->belongsTo(DetilSatker::class);
    }

    public function uraian_satker()
    {
        return $this->belongsTo(UraianSatker::class);
    }

}

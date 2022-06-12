<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Category;

class ActivityController extends Controller
{
    //
    public function index()
    {
        $data = Activity::get();
        // dd($data);

        return view('master.kegiatan.index', [
            'data' => $data,
        ]);
    }

    public function createAct()
    {
        $cat = Category::get();

        return view('master.kegiatan.create',[
            'cat' => $cat,
        ]);
    }

    public function inputAct(Request $request)
    {
        $data = new Activity;
        $data->cat_id = $request->cat_id;
        $data->kode_kegiatan = $request->kode_kegiatan;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->harga_satuan = $request->harga_satuan;
        $data->jumlah = $request->jumlah;
        $data->save();

        return redirect()->route('kegiatan.index')->with([
            'data' => $data,
        ]);
    }
}

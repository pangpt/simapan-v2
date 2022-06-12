<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();

        return view('master.kategori.index',[
            'data' => $data,
        ]);
    }

    public function createCat()
    {
        return view('master.kategori.create');
    }

    public function inputCat(Request $request)
    {
        $data = new Category;
        $data->kode_kategori = $request->kode_kategori;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        return redirect()->route('kategori.index')->with([
            'data' => $data,
        ]);
    }
}

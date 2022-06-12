<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Submenu;
use App\Subcat;
use App\Kegiatan;
use App\Category;
use App\Sub_kegiatan;
use App\Rincian;

class MasterController extends Controller
{
    //
    public function menu()
    {
        $data = Menu::get();

        return view ('master.menu.index', [
            'data' => $data,
        ]);
    }

    public function createMenu()
    {
        return view('master.menu.create');
    }

    public function inputMenu (Request $request)
    {
        $data = new Menu;
        $data->kode_menu = $request->kode_menu;
        $data->nama_menu = $request->nama_menu;
        $data->save();

        return redirect()->route('menu.index')->with([
            'data' => $data,
        ]);
    }

    public function submenu()
    {
        $data = Submenu::get();

        return view ('master.sub_menu.index', [
            'data' => $data,
        ]);
    }

    public function createSubmenu()
    {
        $menu = Menu::get();

        return view ('master.sub_menu.create',[
            'menu' => $menu,
        ]);
    }

    public function inputSubmenu(Request $request)
    {
        $data = new Submenu;
        $data->menu_id = $request->menu_id;
        $data->kode_submenu = $request->kode_submenu;
        $data->nama_submenu = $request->nama_submenu;
        $data->save();

        return redirect()->route('submenu.index')->with([
            'data' => $data,
        ]);
    }

    public function subcat()
    {
        $data = Subcat::get();

        return view('master.subkategori.index', [
            'data' => $data,
        ]);
    }

    public function createSubcat()
    {
        $cat = Category::get();

        return view('master.subkategori.create',[
            'cat' => $cat,
        ]);
    }

    public function inputSubcat(Request $request)
    {
        $data = new Subcat;
        $data->category_id = $request->category_id;
        $data->kode_subcat = $request->kode_subcat;
        $data->nama_subcat = $request->nama_subcat;
        $data->save();

        return redirect()->route('subcat.index')->with([
            'data' => $data,
        ]);
    }

    public function kegiatan()
    {
        $data = Kegiatan::get();

        return view('master.kegiatan.index', [
            'data' => $data,
        ]);
    }

    public function createKegiatan()
    {
        $subcat = Subcat::get();

        return view('master.kegiatan.create',[
            'subcat' => $subcat,
        ]);
    }

    public function inputKegiatan(Request $request)
    {
        $data = new Kegiatan;
        $data->subcat_id = $request->subcat_id;
        $data->kode_kegiatan = $request->kode_kegiatan;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->save();

        return redirect()->route('kegiatan.index')->with([
            'data' => $data,
        ]);
    }

    public function category()
    {
        $data = Category::get();

        return view('master.kategori.index',[
            'data' => $data,
        ]);
    }

    public function createCat()
    {
        $submenu = Submenu::get();

        return view('master.kategori.create',[
            'submenu' => $submenu,
        ]);
    }

    public function inputCat(Request $request)
    {
        $data = new Category;
        $data->submenu_id = $request->submenu_id;
        $data->kode_kategori = $request->kode_kategori;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        return redirect()->route('kategori.index')->with([
            'data' => $data,
        ]);
    }

    public function subkegiatan()
    {
        $data = Sub_kegiatan::get();

        return view('master.subkegiatan.index', [
            'data' => $data,
        ]);
    }

    public function createSubkegiatan()
    {
        $kegiatan = Kegiatan::get();

        return view('master.subkegiatan.create',[
            'kegiatan' => $kegiatan,
        ]);
    }

    public function inputSubkegiatan(Request $request)
    {
        $data = new Sub_kegiatan;
        $data->kegiatan_id = $request->kegiatan_id;
        $data->kode_sub_kegiatan = $request->kode_sub_kegiatan;
        $data->nama_sub_kegiatan = $request->nama_sub_kegiatan;
        $data->save();

        return redirect()->route('subkegiatan.index')->with([
            'data' => $data,
        ]);
    }

    public function rincian()
    {
        $data = Rincian::get();

        return view('master.rincian.index',[
            'data' => $data,
        ]);
    }

    public function createRincian()
    {
        $sub_kegiatan = Sub_kegiatan::get();

        return view('master.rincian.create',[
            'sub_kegiatan' => $sub_kegiatan,
        ]);
    }

    public function inputRincian(Request $request)
    {
        $data = new Rincian;
        $data->sub_kegiatan_id = $request->sub_kegiatan_id;
        $data->nama_rincian = $request->nama_rincian;
        $data->save();

        return redirect()->route('rincian.index')->with([
            'data' => $data,
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planning;
use App\Menu;
use App\Submenu;
use App\Category;
use App\Subcat;
use App\Kegiatan;
use App\Sub_kegiatan;
use App\Rincian;
use App\Realisasi;
use App\Month;
use Auth;
use Carbon\Carbon;
use App\Plan;

class RealisasiController extends Controller
{
    //
    public function index(Request $request)
    {
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $month = Month::get();

        // $last = Realisasi::latest()->first();
        // $tgl = $last->tanggal_kuitansi;
        $data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('bulan', Carbon::now()->isoFormat('MMMM'))->get();
        
        

        // $last = Plan::latest()->first();
        // // dd($last->tanggal_revisi);
        // $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();

        // dd($perencanaan);
        //rumus

        $now = Carbon::now()->isoFormat('MMMM Y');
        $cekbul = $request->bulan;
        
        // dd($now);

        return view('realisasi.index',[
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'month' => $month,
            'cekbul' => $cekbul,
            // 'now' => $now,
        ]);
    }

    public function createRealisasi()
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();

        return view('realisasi.create',[
            'menu' => $menu,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
        ]);
    }

    public function inputRealisasi(Request $request)
    {
        $last = Plan::latest()->first();
        // dd($last->tanggal_revisi);
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->satker = $request->satker;
        $data->tanggal_kuitansi = $request->tanggal_kuitansi;
        $data->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
        $data->tanggal_input = Carbon::now()->format('Y-m-d');
        $data->menu_id = $request->menu_id;
        // $data->bulan = Carbon::now()->isoFormat('MMMM');


        // $splitMenu = explode('-',$request->menu_id);
        // // $a = collect($splitMenu);

        // $data->kode = $splitMenu[0];
        // $data->uraian = $splitMenu[1];

        $data->save();

        // dd($data);

        return redirect()->route('realisasi.index')->with([
            'data' => $data,
        ]);
    }

    public function modalSubmenu(Request $request, $id)
    {
        $last = Plan::latest()->first();
        // dd($last->tanggal_revisi);
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $submenu = Submenu::where('id', $id)->first();
        // dd($submenu);
        // $splitKey = explode('-', $request->submenu_id);
        $submenu = Realisasi::where('id', $id)->first();

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->submenu_id = $request->submenu_id;
        // $data->kode = $splitKey[0];
        // $data->uraian = $splitKey[1];
        $data->tanggal_kuitansi = $submenu->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d');
        $data->bulan = Carbon::createFromFormat('Y-m-d', $submenu->tanggal_kuitansi)->isoFormat('MMMM');
        $data->parent_id = $id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
        // dd($data);
    }

    public function modalKategori(Request $request, $id)
    {
        $last = Plan::latest()->first();
        // dd($last->tanggal_revisi);
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $submenu = Category::where('id', $id)->first();
        // dd($submenu);
        // $splitCat = explode('-', $request->category_id);
        $cat = Realisasi::where('id', $id)->first();


        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->category_id = $request->category_id;
        // $data->kode = $splitCat[0];
        // $data->uraian = $splitCat[1];
        $data->tanggal_kuitansi = $cat->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d');
        $data->bulan = Carbon::createFromFormat('Y-m-d', $cat->tanggal_kuitansi)->isoFormat('MMMM');
        $data->parent_id = $id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
        // dd($data);
    }

    public function modalSubcat(Request $request, $id)
    {
        $last = Plan::latest()->first();
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $splitCat = explode('-', $request->subcat_id);
        $subcat = Realisasi::where('id', $id)->first();

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->subcat_id = $request->subcat_id;
        // $data->kode = $splitCat[0];
        // $data->uraian = $splitCat[1];
        $data->tanggal_kuitansi = $subcat->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d');
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subcat->tanggal_kuitansi)->isoFormat('MMMM');
        $data->parent_id = $id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalKegiatan(Request $request, $id)
    {
        $last = Plan::latest()->first();
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $splitCat = explode('-', $request->kegiatan_id);
        $keg = Realisasi::where('id', $id)->first();

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->kegiatan_id = $request->kegiatan_id;
        // $data->kode = $splitCat[0];
        // $data->uraian = $splitCat[1];
        $data->tanggal_kuitansi = $keg->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $keg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->parent_id = $id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalSubkegiatan(Request $request, $id)
    {
        $last = Plan::latest()->first();
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $splitCat = explode('-', $request->sub_kegiatan_id);
        $subkeg = Realisasi::where('id', $id)->first();

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->sub_kegiatan_id = $request->sub_kegiatan_id;
        // $data->kode = $splitCat[0];
        // $data->uraian = $splitCat[1];
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->parent_id = $id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalRincian(Request $request, $id)
    {
        $last = Plan::latest()->first();
        $perencanaan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('menu_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        // $splitCat = explode('-', $request->sub_kegiatan_id);
        $rinc = Realisasi::where('parent_id', $id)->first();
        $add = Realisasi::where('id', $id)->first();
        // dd($rinc);

        $data = new Realisasi;
        $data->plan_id = $perencanaan->id;
        $data->rincian_id = $request->rincian_id;
        $data->kode = '-';
        // $data->uraian =$request->rincian_id;
        $data->parent_id = $id;
        $data->tanggal_kuitansi = $request->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
        $data->jumlah = $request->jumlah;
        $data->penerima = $request->penerima;
        $data->keterangan = $request->keterangan;
        
        $conbulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
        
            if($conbulan == 'Januari'){
                     $data->pagu_jan = $request->jumlah;
            } elseif ($conbulan == 'Februari'){
                     $data->pagu_feb = $request->jumlah;
            } elseif ($conbulan == 'Maret'){
                     $data->pagu_mar = $request->jumlah;
            } elseif ($conbulan == 'April'){
                     $data->pagu_apr = $request->jumlah;
            } elseif ($conbulan == 'Mei'){
                     $data->pagu_mei = $request->jumlah;
            } elseif ($conbulan == 'Juni'){
                     $data->pagu_jun = $request->jumlah;
            } elseif ($conbulan == 'Juli'){
                     $data->pagu_jul = $request->jumlah;
            } elseif ($conbulan == 'Agustus'){
                     $data->pagu_agt = $request->jumlah;
            } elseif ($conbulan == 'September'){
                     $data->pagu_sep = $request->jumlah;
            } elseif ($conbulan == 'Oktober'){
                     $data->pagu_okt = $request->jumlah;
            } elseif ($conbulan == 'November'){
                     $data->pagu_nov = $request->jumlah;
            } elseif ($conbulan == 'Desember'){
                     $data->pagu_des = $request->jumlah;
            }  
          
        $data->save();

        $add->jumlah += $request->jumlah;
        $add->update();

        $upper = Realisasi::where('id', $add->parent_id)->first();
        $up = Realisasi::where('id', $upper->parent_id)->first();
        $top = Realisasi::where('id', $up->parent_id)->first();
        $high = Realisasi::where('id', $top->parent_id)->first();
        $higher = Realisasi::where('id', $high->parent_id)->first();
        // dd($upper);
        $upper->jumlah += $request->jumlah;
        $upper->update();

        $up->jumlah += $request->jumlah;
        $up->update();

        $top->jumlah += $request->jumlah;
        $top->update();

        $high->jumlah += $request->jumlah;
        $high->update();

        $higher->jumlah += $request->jumlah;
        $higher->update();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function penarikan(Request $request, $id)
    {
        $data = Realisasi::where('id', $id)->first();

        $data->pagu_jan = $request->pagu_jan;
        $data->pagu_feb = $request->pagu_feb;
        $data->pagu_mar = $request->pagu_mar;
        $data->pagu_apr = $request->pagu_apr;
        $data->pagu_mei = $request->pagu_mei;
        $data->pagu_jun = $request->pagu_jun;
        $data->pagu_jul = $request->pagu_jul;
        $data->pagu_agt = $request->pagu_agt;
        $data->pagu_sep = $request->pagu_sep;
        $data->pagu_okt = $request->pagu_okt;
        $data->pagu_nov = $request->pagu_nov;
        $data->pagu_des = $request->pagu_des;
        $data->update();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function totalreal ($id)
    {
        $a = Realisasi::where('parent_id', $id)->get();
        $total = Realisasi::where('id', $id)->first();
        $tot[] = 0;
        foreach($a as $key){
            $tot[] = $key->jumlah;
        }


        $jum = array_sum($tot);
        $total->jumlah = $jum;
        $total->update();
        
       
        
        return redirect()->route('realisasi.index')->with(['success' => 'Berhasil menjumlah data']);
    }

    public function editrealisasi(Request $request, $id)
    {
        $rev = Realisasi::where('id', $id)->first();
        // dd($rev);
        $revtot = Realisasi::where('id', $rev->parent_id)->first();

        $last = Realisasi::latest()->first();

        $data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('tanggal_kuitansi', $last->tanggal_kuitansi)->get();
        if(Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM') != Carbon::createFromFormat('Y-m-d', $revtot->tanggal_kuitansi)->isoFormat('MMMM')) {
            return redirect()->route('realisasi.index')->with('error', 'Tidak bisa edit untuk bulan lain! Silahkan filter bulan terlebih dahulu!');
        } else {
            $rev->tanggal_kuitansi = $request->tanggal_kuitansi;
            $rev->jumlah = $request->jumlah;
            $rev->penerima = $request->penerima;
            $rev->keterangan = $request->keterangan;
            $rev->update();
        }

        // $cek = Plan::where('id',$id)->get(); 
        // dd($cek);
        // $ach = Plan::where('parent_id', $f->id)->get();
        // dd($ach);


        return redirect()->route('realisasi.index')->with([
            'rev' => $rev,
        ]);
    }

    //     public function editrealisasi(Request $request, $id)
    // {
    //     $rev = Realisasi::where('id', $id)->first();
    //     // dd($rev);
    //     $revtot = Realisasi::where('id', $rev->parent_id)->first();

    //     $last = Realisasi::latest()->first();

    //     $data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('tanggal_kuitansi', $last->tanggal_kuitansi)->get();
    //     if($request->tanggal_kuitansi != $last->tanggal_kuitansi) {
    //     foreach($data as $key){
    //         $a = $key->replicate();
    //         $a->save();

    //         $a->tanggal_kuitansi = $request->tanggal_kuitansi;
    //         $a->jumlah = 0;
    //         $a->penerima = $request->penerima;
    //         $a->keterangan = $request->keterangan;
    //         $a->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //         $a->update();
    //             foreach($key->children as $child){
    //             $ch = Realisasi::where('id', $a->id)->first();
    //             $b = $child->replicate();
    //             $b->save();

    //             $b->tanggal_kuitansi = $request->tanggal_kuitansi;
    //             $b->jumlah = 0;
    //             $b->penerima = $request->penerima;
    //             $b->keterangan = $request->keterangan;
    //             $b->parent_id = $ch->id;
    //             $b->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //             $b->update();
    //             // dd($a);
    //                 foreach($child->children as $gchild){
    //                     $gch = Realisasi::where('id', $b->id)->first();
    //                     $c = $gchild->replicate();
    //                     $c->save();

    //                     $c->tanggal_kuitansi = $request->tanggal_kuitansi;
    //                     $c->parent_id = $gch->id;
    //                     $c->jumlah = 0;
    //                     $c->penerima = $request->penerima;
    //                     $c->keterangan = $request->keterangan;
    //                     $c->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                     $c->update();
    //                         foreach($gchild->children as $ggchild){
    //                         $ggch = Realisasi::where('id', $c->id)->first();
    //                         $d = $ggchild->replicate();
    //                         $d->save();

    //                         $d->parent_id = $ggch->id;
    //                         $d->tanggal_kuitansi = $request->tanggal_kuitansi;
    //                         $d->jumlah = 0;
    //                         $d->penerima = $request->penerima;
    //                         $d->keterangan = $request->keterangan;
    //                         $d->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                         $d->update();
    //                             foreach($ggchild->children as $zchild){
    //                             $zch = Realisasi::where('id', $d->id)->first();
    //                             $e = $zchild->replicate();
    //                             $e->save();

                                
    //                             $e->parent_id = $zch->id;
    //                             $e->tanggal_kuitansi = $request->tanggal_kuitansi;
    //                             $e->jumlah = 0;
    //                             $e->penerima = $request->penerima;
    //                             $e->keterangan = $request->keterangan;
    //                             $e->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                             $e->update();
    //                                 foreach($zchild->children as $zzchild){
    //                                 $zzch = Realisasi::where('id', $e->id)->first();
    //                                 $f = $zzchild->replicate();
    //                                 $f->save();

    //                                 $f->parent_id = $zzch->id;
    //                                 $request->tanggal_kuitansi;
    //                                 $f->jumlah = 0;
    //                                 $f->penerima = $request->penerima;
    //                                 $f->keterangan = $request->keterangan;
    //                                 $f->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                                 $f->update();
    //                                     foreach($zzchild->children as $achild){
    //                                     $ach = Realisasi::where('id', $f->id)->first();
    //                                     if($achild->id == $rev->id) {
    //                                         $g = $achild->replicate();
    //                                         $g->save();

    //                                         $g->tanggal_kuitansi = $request->tanggal_kuitansi;
    //                                         $g->jumlah = $request->jumlah;
    //                                         $g->parent_id = $ach->id;
    //                                         $g->penerima = $request->penerima;
    //                                         $g->keterangan = $request->keterangan;
    //                                         $g->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                                         $g->update();

                                            
    //                                     } else{
    //                                         $g = $achild->replicate();
    //                                         $g->save();
                                            
    //                                         $g->tanggal_kuitansi = $request->tanggal_kuitansi;
    //                                         $g->parent_id = $ach->id;
    //                                         $g->penerima = $request->penerima;
    //                                         $g->keterangan = $request->keterangan;
    //                                         $g->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
    //                                         $g->update();
    //                                     }
    //                                     // dd($f->jumlah);
    //                                     }
    //                                 }
    //                              }
    //                         }
    //                 }
    //             }
    //     }
    // } else {
    //     $rev->tanggal_kuitansi = $request->tanggal_kuitansi;
    //     $rev->jumlah = $request->jumlah;
    //     $rev->penerima = $request->penerima;
    //     $rev->keterangan = $request->keterangan;
    //     $rev->update();
    // }

    //     // $cek = Plan::where('id',$id)->get(); 
    //     // dd($cek);
    //     // $ach = Plan::where('parent_id', $f->id)->get();
    //     // dd($ach);


    //     return redirect()->route('realisasi.index')->with([
    //         'rev' => $rev,
    //     ]);
    // }

    public function hapus ($id)
    {
        $real = Realisasi::where('parent_id', $id)->delete();

        $data = Realisasi::findOrFail($id);
        $data->delete();



        return redirect()->route('realisasi.index')->with(['success' => 'Berhasil menghapus data']);
    }

    public function filterrealisasi(Request $request) 
    {
        $bul = $request->bulan;
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $cekbul = $request->bulan;
        $month = Month::get();

        if(empty($request->bulan)){
            $data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->get();
        } else {
            
            $data = Realisasi::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('uraian','asc')
            ->where('bulan', $request->bulan)
            ->get();
        }

        return view('realisasi.index')->with([
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'month' => $month,
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'cekbul' => $cekbul,
        ]);
    }
}

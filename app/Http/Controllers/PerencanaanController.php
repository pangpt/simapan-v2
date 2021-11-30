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
use App\Perencanaan;
use App\Plan;
use App\Month;
use Auth;
use DB;

class PerencanaanController extends Controller
{
    //
    public function perencanaan(Request $request)
    {
        // dd($request->session());
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $month = Month::get();


        $last = Plan::latest()->first();
        // dd($last->tanggal_revisi);
        @$data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();

        @$tgl_simpan = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->first();
        // dd($tgl_simpan);
        // dd($data);
        // dd($menusatu);

        // $total = array_sum($a);
        // dd($total);

        // dd($data);
        return view('perencanaan.index',[
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'month' => $month,
            'tgl_simpan' => $tgl_simpan,
        ]);
    }

    public function createPerencanaan()
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();

        return view('perencanaan.create',[
            'menu' => $menu,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
        ]);
    }

    public function inputPerencanaan(Request $request)
    {
        // $menu1 = '1066-Pembinaan Administrasi dan Pengelolaan Keuangan Badan Urusan Administrasi';
        // $menu2 = '1071-Pengadaan Sarana dan Prasarana di Lingkungan Mahkamah Agung';
        // $splitMenu1 = explode('-',$menu1);
        // $splitMenu2 = explode('-',$menu2);
        // // $a = collect($splitMenu);
        // // $data = new Plan;
        // $data = Plan::insert([
        //     [
        //         'jenis_revisi' => $request->jenis_revisi,
        //         'tanggal_revisi' => $request->tanggal_revisi,
        //         'tanggal_input' => $request->tanggal_input,
        //         'kode' => $splitMenu1[0],
        //         'menu_id' => $splitMenu1[1],
        //         'created_at' => $request->tanggal_revisi,
        //     ],
        //     [
        //         'jenis_revisi' => $request->jenis_revisi,
        //         'tanggal_revisi' => $request->tanggal_revisi,
        //         'tanggal_input' => $request->tanggal_input,
        //         'kode' => $splitMenu2[0],
        //         'menu_id' => $splitMenu2[1],
        //         'menu_id' => $splitMenu2[1],
        //         'created_at' => $request->tanggal_revisi,
        //     ],
        // ]);
        $data = new Plan;
        $data->jenis_revisi = $request->jenis_revisi;
        $data->tanggal_revisi = $request->tanggal_revisi;
        $data->tanggal_input = $request->tanggal_revisi;
        $data->menu_id = $request->menu_id;
        $data->cek_sub_id = 1;
        $data->save();

        // dd($data);

        return redirect()->route('perencanaan.index')->with([
            'data' => $data,
        ]);
    }

    public function plan(Request $request)
    {
        $data = Plan::where('parent_id', 0)->with('children.children')->get();
        // dd(json_decode($data));
        // $data = json_decode($data);
        if($request->ajax()){
            return datatables()->of($data)->make(true);
        }

        return view('plan.index');
    }

    public function createPlan()
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();

        return view('plan.create',[
            'menu' => $menu,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
        ]);
    }

    public function modalSubmenu(Request $request, $id)
    {
        $submenu = Plan::where('id', $id)->first();
        // $splitKey = explode('-', $request->submenu_id);

        $data = new Plan;
        $data->parent_id = $id;
        $data->jenis_revisi = $submenu->jenis_revisi;
        $data->tanggal_input = $submenu->tanggal_input;
        $data->tanggal_revisi = $submenu->tanggal_input;
        $data->submenu_id = $request->submenu_id;
        $data->cek_sub_id = 2;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
        // dd($data);
    }

    public function modalKategori(Request $request, $id)
    {
        // $submenu = Category::where('id', $id)->first();
        // dd($submenu);
        // $splitCat = explode('-', $request->category_id);

        $cat = Plan::where('id', $id)->first();
        $data = new Plan;
        $data->jenis_revisi = $cat->jenis_revisi;
        $data->tanggal_input = $cat->tanggal_input;
        $data->tanggal_revisi = $cat->tanggal_input;
        $data->parent_id = $id;
        $data->category_id = $request->category_id;
        $data->cek_sub_id = 3;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
        // dd($data);
    }

    public function modalSubcat(Request $request, $id)
    {
        // $splitCat = explode('-', $request->subcat_id);
        $subcat = Plan::where('id', $id)->first();
        $data = new Plan;
        $data->jenis_revisi = $subcat->jenis_revisi;
        $data->tanggal_input = $subcat->tanggal_input;
        $data->tanggal_revisi = $subcat->tanggal_input;
        $data->parent_id = $id;
        $data->subcat_id = $request->subcat_id;
        $data->cek_sub_id = 4;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalKegiatan(Request $request, $id)
    {
        // $splitCat = explode('-', $request->kegiatan_id);
        $keg = Plan::where('id', $id)->first();

        $data = new Plan;
        $data->jenis_revisi = $keg->jenis_revisi;
        $data->tanggal_input = $keg->tanggal_input;
        $data->tanggal_revisi = $keg->tanggal_input;
        $data->parent_id = $id;
        $data->kegiatan_id = $request->kegiatan_id;
        $data->cek_sub_id = 5;
        $data->save();
        // dd($id);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalSubkegiatan(Request $request, $id)
    {
        // $splitCat = explode('-', $request->sub_kegiatan_id);
        $subkeg = Plan::where('id', $id)->first();

        $data = new Plan;
        $data->jenis_revisi = $subkeg->jenis_revisi;
        $data->tanggal_input = $subkeg->tanggal_input;
        $data->tanggal_revisi = $subkeg->tanggal_input;
        $data->parent_id = $id;
        $data->sub_kegiatan_id = $request->sub_kegiatan_id;
        $data->cek_sub_id = 6;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalRincian(Request $request, $id)
    {
        // $splitCat = explode('-', $request->sub_kegiatan_id);
        $menu = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->get();
        // $a = [];

        $rinc = Plan::where('id', $id)->first();

        $data = new Plan;
        $data->jenis_revisi = $rinc->jenis_revisi;
        $data->tanggal_input = $rinc->tanggal_input;
        $data->tanggal_revisi = $rinc->tanggal_input;
        $data->kode = '-';
        $data->rincian_id =$request->rincian_id;
        $data->parent_id = $id;
        $data->pagu_total = $request->pagu_total;
        $data->sisa_pagu = $request->pagu_total;
        $data->cek_sub_id = 7;
        $data->save();

        $rinc->pagu_total += $request->pagu_total;
        $rinc->sisa_pagu += $request->pagu_total;
        $rinc->update();

        $upper = Plan::where('id', $rinc->parent_id)->first();
        $up = Plan::where('id', $upper->parent_id)->first();
        $top = Plan::where('id', $up->parent_id)->first();
        $high = Plan::where('id', $top->parent_id)->first();
        $higher = Plan::where('id', $high->parent_id)->first();
        // dd($upper);
        $upper->pagu_total += $request->pagu_total;
        $upper->sisa_pagu += $request->pagu_total;
        $upper->update();

        $up->pagu_total += $request->pagu_total;
        $up->sisa_pagu += $request->pagu_total;
        $up->update();

        $top->pagu_total += $request->pagu_total;
        $top->sisa_pagu += $request->pagu_total;
        $top->update();

        $high->pagu_total += $request->pagu_total;
        $high->sisa_pagu += $request->pagu_total;
        $high->update();

        $higher->pagu_total += $request->pagu_total;
        $higher->sisa_pagu += $request->pagu_total;
        $higher->update();




        return redirect()->back()->with([
            'data' => $data,
            'rinc' => $rinc,
        ]);
    }

    public function penarikan(Request $request, $id)
    {
        $data = Plan::where('id', $id)->first();
        $total = Plan::where('id', $data->parent_id)->first();
        $upper = Plan::where('id', $total->parent_id)->first();
        $up = Plan::where('id', $upper->parent_id)->first();
        // dd($upper);

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

        $data->sisa_pagu = @$data->pagu_total - ($request->pagu_jan + $request->pagu_feb + $request->pagu_mar + $request->pagu_apr + $request->pagu_mei + $request->pagu_jun + $request->pagu_jul + $request->pagu_agt + $request->pagu_sep + $request->pagu_okt + $request->pagu_nov + $request->pagu_des);

        $data->update();

        $upper = Plan::where('id', $data->parent_id)->first();
        $up = Plan::where('id', $upper->parent_id)->first();
        $top = Plan::where('id', $up->parent_id)->first();
        $high = Plan::where('id', $top->parent_id)->first();
        $higher = Plan::where('id', $high->parent_id)->first();
        $best = Plan::where('id', $higher->parent_id)->first();

        $upper->pagu_jan += $request->pagu_jan;
        $upper->pagu_jan += $request->pagu_jan;
        $upper->pagu_feb += $request->pagu_feb;
        $upper->pagu_mar += $request->pagu_mar;
        $upper->pagu_apr += $request->pagu_apr;
        $upper->pagu_mei += $request->pagu_mei;
        $upper->pagu_jun += $request->pagu_jun;
        $upper->pagu_jul += $request->pagu_jul;
        $upper->pagu_agt += $request->pagu_agt;
        $upper->pagu_sep += $request->pagu_sep;
        $upper->pagu_okt += $request->pagu_okt;
        $upper->pagu_nov += $request->pagu_nov;
        $upper->pagu_des += $request->pagu_des;
        $upper->update();

        $up->pagu_jan += $request->pagu_jan;
        $up->pagu_feb += $request->pagu_feb;
        $up->pagu_mar += $request->pagu_mar;
        $up->pagu_apr += $request->pagu_apr;
        $up->pagu_mei += $request->pagu_mei;
        $up->pagu_jun += $request->pagu_jun;
        $up->pagu_jul += $request->pagu_jul;
        $up->pagu_agt += $request->pagu_agt;
        $up->pagu_sep += $request->pagu_sep;
        $up->pagu_okt += $request->pagu_okt;
        $up->pagu_nov += $request->pagu_nov;
        $up->pagu_des += $request->pagu_des;
        $up->update();

        $top->pagu_jan += $request->pagu_jan;
        $top->pagu_feb += $request->pagu_feb;
        $top->pagu_mar += $request->pagu_mar;
        $top->pagu_apr += $request->pagu_apr;
        $top->pagu_mei += $request->pagu_mei;
        $top->pagu_jun += $request->pagu_jun;
        $top->pagu_jul += $request->pagu_jul;
        $top->pagu_agt += $request->pagu_agt;
        $top->pagu_sep += $request->pagu_sep;
        $top->pagu_okt += $request->pagu_okt;
        $top->pagu_nov += $request->pagu_nov;
        $top->pagu_des += $request->pagu_des;
        $top->update();

        $high->pagu_jan += $request->pagu_jan;
        $high->pagu_feb += $request->pagu_feb;
        $high->pagu_mar += $request->pagu_mar;
        $high->pagu_apr += $request->pagu_apr;
        $high->pagu_mei += $request->pagu_mei;
        $high->pagu_jun += $request->pagu_jun;
        $high->pagu_jul += $request->pagu_jul;
        $high->pagu_agt += $request->pagu_agt;
        $high->pagu_sep += $request->pagu_sep;
        $high->pagu_okt += $request->pagu_okt;
        $high->pagu_nov += $request->pagu_nov;
        $high->pagu_des += $request->pagu_des;
        $high->update();

        $higher->pagu_jan += $request->pagu_jan;
        $higher->pagu_feb += $request->pagu_feb;
        $higher->pagu_mar += $request->pagu_mar;
        $higher->pagu_apr += $request->pagu_apr;
        $higher->pagu_mei += $request->pagu_mei;
        $higher->pagu_jun += $request->pagu_jun;
        $higher->pagu_jul += $request->pagu_jul;
        $higher->pagu_agt += $request->pagu_agt;
        $higher->pagu_sep += $request->pagu_sep;
        $higher->pagu_okt += $request->pagu_okt;
        $higher->pagu_nov += $request->pagu_nov;
        $higher->pagu_des += $request->pagu_des;
        $higher->update();

        $best->pagu_jan += $request->pagu_jan;
        $best->pagu_feb += $request->pagu_feb;
        $best->pagu_mar += $request->pagu_mar;
        $best->pagu_apr += $request->pagu_apr;
        $best->pagu_mei += $request->pagu_mei;
        $best->pagu_jun += $request->pagu_jun;
        $best->pagu_jul += $request->pagu_jul;
        $best->pagu_agt += $request->pagu_agt;
        $best->pagu_sep += $request->pagu_sep;
        $best->pagu_okt += $request->pagu_okt;
        $best->pagu_nov += $request->pagu_nov;
        $best->pagu_des += $request->pagu_des;
        $best->update();

        // dd($data);
        $tot = Plan::where('parent_id', $request->parent_id)->get();
        $b[] = 0;
        foreach($tot as $key){
            $b[] = $key->sisa_pagu;
        }

        $jml = array_sum($b);
        $total->sisa_pagu = $jml;
        $total->update();

        // dd($total);


        $tot = Plan::where('parent_id', $data->parent_id)->get();
        $a[] = 0;
        foreach($tot as $key){
            $a[] = $key->sisa_pagu;
        }

        $jum = array_sum($a);
        $total->sisa_pagu = $jum;
        $total->update();
        // dd($jum);

        // $upper->sisa_pagu = $jum;
        // $upper->update();

        // $up->sisa_pagu = $jml;
        // $up->update();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    // private function replicate($data, Request $request, $parent = 0){
    //     foreach($data as $val){
    //         $parent = $val->replicate();
    //         $parent->tanggal_revisi = $request->tanggal_revisi;
    //         $parent->pagu_total = 0;
    //         $parent->status = 1;
    //         $parent->save();

    //         if($val->children){
    //             $child = $val->children->replicate();
    //             $child->tanggal_revisi = $request->tanggal_revisi;
    //             $child->pagu_total = 0;
    //             $child->status = 1;
    //             $child->parent_id = $parent->id;
    //             $child->save();

                
    //         }

    //     }
    // }
    public function revisi (Request $request, $id)
    {
        $rev = Plan::where('id', $id)->first();
        // dd($rev);
        $revtot = Plan::where('id', $rev->parent_id)->first();
        //    dd($revtot);
        $last = Plan::latest()->first();
        // $data = Plan::where('parent_id',0)->with('children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();
        $data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();
        if($request->tanggal_revisi != $last->tanggal_revisi) {
        foreach($data as $key){
            $a = $key->replicate();
            $a->save();

            $a->tanggal_revisi = $request->tanggal_revisi;
            $a->pagu_total = 0;
            $a->status = 1;
            $a->update();
                foreach($key->children as $child){
                $ch = Plan::where('id', $a->id)->first();
                $b = $child->replicate();
                $b->save();

                $b->tanggal_revisi = $request->tanggal_revisi;
                $b->parent_id = $ch->id;
                $b->pagu_total = 0;
                $b->status = 1;
                $b->update();
                // dd($a);
                    foreach($child->children as $gchild){
                        $gch = Plan::where('id', $b->id)->first();
                        $c = $gchild->replicate();
                        $c->save();

                        $c->tanggal_revisi = $request->tanggal_revisi;
                        $c->parent_id = $gch->id;
                        $c->pagu_total = 0;
                        $c->status = 1;
                        $c->update();
                            foreach($gchild->children as $ggchild){
                            $ggch = Plan::where('id', $c->id)->first();
                            $d = $ggchild->replicate();
                            $d->save();

                            $d->tanggal_revisi = $request->tanggal_revisi;
                            $d->parent_id = $ggch->id;
                            $d->pagu_total = 0;
                            $d->status = 1;
                            $d->update();
                                foreach($ggchild->children as $zchild){
                                $zch = Plan::where('id', $d->id)->first();
                                $e = $zchild->replicate();
                                $e->save();

                                $e->tanggal_revisi = $request->tanggal_revisi;
                                $e->parent_id = $zch->id;
                                $e->pagu_total = 0;
                                $e->status = 1;
                                $e->update();
                                    foreach($zchild->children as $zzchild){
                                    $zzch = Plan::where('id', $e->id)->first();
                                    $f = $zzchild->replicate();
                                    $f->save();

                                    $f->tanggal_revisi = $request->tanggal_revisi;
                                    $f->parent_id = $zzch->id;
                                    $f->pagu_total = 0;
                                    $f->status = 1;
                                    $f->update();
                                        foreach($zzchild->children as $achild){
                                        $ach = Plan::where('id', $f->id)->first();
                                        if($achild->id == $rev->id) {
                                            $g = $achild->replicate();
                                            $g->save();

                                            $g->jenis_revisi = $request->jenis_revisi;
                                            $g->tanggal_revisi = $request->tanggal_revisi;
                                            $g->pagu_total = $request->pagu_total;
                                            $g->parent_id = $ach->id;
                                            $g->status = 1;
                                            $g->update();

                                            
                                        } else{
                                            $g = $achild->replicate();
                                            $g->save();

                                            $g->jenis_revisi = $request->jenis_revisi;
                                            $g->tanggal_revisi = $request->tanggal_revisi;
                                            $g->parent_id = $ach->id;
                                            $g->status = 1;
                                            $g->update();
                                        }
                                        // dd($f->pagu_total);
                                        }
                                    }
                                 }
                            }
                    }
                }
        }
    } else {
        $rev->jenis_revisi = $request->jenis_revisi;
        $rev->tanggal_revisi = $request->tanggal_revisi;
        $rev->pagu_total = $request->pagu_total;
        $rev->status = 1;
        $rev->update();
    }

        // $cek = Plan::where('id',$id)->get(); 
        // dd($cek);
        // $ach = Plan::where('parent_id', $f->id)->get();
        // dd($ach);


        return redirect()->route('perencanaan.index')->with([
            'rev' => $rev,
        ]);
    }

    public function hapus ($id)
    {
        //hapus parent_id yang sama dengan id
        $plan = Plan::where('parent_id', $id)->delete();

        $data = Plan::findOrFail($id);
        $data->delete();

        return redirect()->route('perencanaan.index')->with(['success' => 'Berhasil menghapus data']);
    }

    public function total ($id)
    {
        $a = Plan::where('parent_id', $id)->get();
        $total = Plan::where('id', $id)->first();
        $tot= [];
        $jan = [];
        $feb = [];
        $mar = [];
        $apr = [];
        $mei = [];
        $jun = [];
        $jul = [];
        $agt = [];
        $sep = [];
        $okt = [];
        $nov = [];
        $des     = [];
        foreach($a as $key){
            $tot[] = $key->pagu_total;
            $jan[] = $key->pagu_jan;
            $feb[] = $key->pagu_feb;
            $mar[] = $key->pagu_mar;
            $apr[] = $key->pagu_apr;
            $mei[] = $key->pagu_mei;
            $jun[] = $key->pagu_jun;
            $jul[] = $key->pagu_jul;
            $agt[] = $key->pagu_agt;
            $sep[] = $key->pagu_sep;
            $okt[] = $key->pagu_okt;
            $nov[] = $key->pagu_nov;
            $des[] = $key->pagu_des;
        }

        $jum = array_sum($tot);
        $total->pagu_total = $jum;
        $total->update();
        
        $jan = array_sum($jan);
        $total->pagu_jan = $jan;
        $total->update();

        $feb = array_sum($feb);
        $total->pagu_feb = $feb;
        $total->update();

        $mar = array_sum($mar);
        $total->pagu_mar = $mar;
        $total->update();

        $apr = array_sum($apr);
        $total->pagu_apr = $apr;
        $total->update();

        $mei = array_sum($mei);
        $total->pagu_mei = $mei;
        $total->update();

        $jun = array_sum($jun);
        $total->pagu_jun = $jun;
        $total->update();

        $jul = array_sum($jul);
        $total->pagu_jul = $jul;
        $total->update();

        $agt = array_sum($agt);
        $total->pagu_agt = $agt;
        $total->update();

        $sep = array_sum($sep);
        $total->pagu_sep = $sep;
        $total->update();
        
        $okt = array_sum($okt);
        $total->pagu_okt = $okt;
        $total->update();
        $nov = array_sum($nov);
        $total->pagu_nov = $nov;
        $total->update();
        $des = array_sum($des);
        $total->pagu_des = $des;
        $total->update();
        
        return redirect()->route('perencanaan.index')->with(['success' => 'Berhasil menjumlah data']);
    }

    public function simpanrencana ()
    {
        $data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->get();
        // dd(collect($data));

        $simpan = DB::table('plans')->update(array('status' => 1));

        return redirect()->back();
        
        

    }



}

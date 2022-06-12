<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramSatker;
use App\KegiatanSatker;
use App\SubKegiatanSatker;
use App\MenuSatker;
use App\RincianSatker;
use App\DetilSatker;
use App\UraianSatker;
use App\PerencanaanSatker;
use App\Month;
use DB;

class PerencanaanSatkerController extends Controller
{
    //
    public function perencanaansatker(Request $request)
    {
        // dd($request->session());
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();



        $last = PerencanaanSatker::latest()->first();
        // dd($last->tanggal_revisi);
        @$data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();

        @$tgl_simpan = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->first();

        return view('satker.perencanaan.index',[
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
            'tgl_simpan' => $tgl_simpan,
        ]);
    }

    public function createperencanaansatker()
    {
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();

        return view('satker.perencanaan.create',[
            // 'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
        ]);
    }

    public function inputperencanaansatker(Request $request)
    {
        $data = new PerencanaanSatker;
        $data->jenis_revisi = $request->jenis_revisi;
        $data->tanggal_revisi = $request->tanggal_revisi;
        $data->tanggal_input = $request->tanggal_revisi;
        $data->program_satker_id = $request->program_id;
        $data->save();
        // $menu1 = '005.04.BF-Program Penegakan dan Pelayanan Hukum';

        // $splitMenu = explode('-',$menu1);
        // // $a = collect($splitMenu);

        // $data = new PerencanaanSatker;
        // $data->jenis_revisi = $request->jenis_revisi;
        // $data->tanggal_revisi = $request->tanggal_revisi;
        // $data->kode = $splitMenu[0];
        // $data->uraian = $splitMenu[1];

        // $data->save();

        // // dd($data);

        return redirect()->route('perencanaansatker.index')->with([
            'data' => $data,
        ]);
    }

    public function modalKegiatan(Request $request, $id) {
        $keg = PerencanaanSatker::where('id', $id)->first();
        
        $data = new PerencanaanSatker;
        $data->jenis_revisi = $keg->jenis_revisi;
        $data->tanggal_input = $keg->tanggal_input;
        $data->tanggal_revisi = $keg->tanggal_input;
        $data->parent_id = $id;
        $data->kegiatan_satker_id = $request->kegiatan_id;
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

     public function modalSubkegiatan(Request $request, $id)
    {
        $subkeg = PerencanaanSatker::where('id', $id)->first();

        $data = new PerencanaanSatker;
        $data->jenis_revisi = $subkeg->jenis_revisi;
        $data->tanggal_input = $subkeg->tanggal_input;
        $data->tanggal_revisi = $subkeg->tanggal_input;
        $data->parent_id = $id;
        $data->sub_kegiatan_satker_id = $request->sub_kegiatan_id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalMenu(Request $request, $id)
    {
        $menu = PerencanaanSatker::where('id', $id)->first();

        $data = new PerencanaanSatker;
        $data->jenis_revisi = $menu->jenis_revisi;
        $data->tanggal_input = $menu->tanggal_input;
        $data->tanggal_revisi = $menu->tanggal_input;
        $data->parent_id = $id;
        $data->menu_satker_id = $request->menu_id;
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalRincian(Request $request, $id)
    {
        $rinc = PerencanaanSatker::where('id', $id)->first();

        $data = new PerencanaanSatker;
        $data->jenis_revisi = $rinc->jenis_revisi;
        $data->tanggal_input = $rinc->tanggal_input;
        $data->tanggal_revisi = $rinc->tanggal_input;
        $data->parent_id = $id;
        $data->rincian_satker_id = $request->rincian_id;
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalDetil(Request $request, $id)
    {
        $detil = PerencanaanSatker::where('id', $id)->first();

        $data = new PerencanaanSatker;
        $data->jenis_revisi = $detil->jenis_revisi;
        $data->tanggal_input = $detil->tanggal_input;
        $data->tanggal_revisi = $detil->tanggal_input;
        $data->parent_id = $id;
        $data->detil_satker_id = $request->detil_id;
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalUraian(Request $request, $id)
    {
        $base = PerencanaanSatker::where('id', $id)->first();
        

        $data = new PerencanaanSatker;
        $data->jenis_revisi = $base->jenis_revisi;
        $data->tanggal_input = $base->tanggal_input;
        $data->tanggal_revisi = $base->tanggal_input;
        $data->parent_id = $id;
        $data->uraian_satker_id = $request->uraian_id;
        $data->pagu_total = $request->pagu_total;
        $data->save();

        $base->pagu_total += $request->pagu_total;
        $base->update();

        $upper = PerencanaanSatker::where('id', $base->parent_id)->first();
        $up = PerencanaanSatker::where('id', $upper->parent_id)->first();
        $top = PerencanaanSatker::where('id', $up->parent_id)->first();
        $high = PerencanaanSatker::where('id', $top->parent_id)->first();
        $higher = PerencanaanSatker::where('id', $high->parent_id)->first();

        $upper->pagu_total += $request->pagu_total;
        $upper->update();

        $up->pagu_total += $request->pagu_total;
        $up->update();

        $top->pagu_total += $request->pagu_total;
        $top->update();

        $high->pagu_total += $request->pagu_total;
        $high->update();

        $higher->pagu_total += $request->pagu_total;
        $higher->update();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function penarikan(Request $request, $id)
    {
        $data = PerencanaanSatker::where('id', $id)->first();

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
        // dd($data);

        

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function penarikansatker(Request $request, $id)
    {
        $data = PerencanaanSatker::where('id', $id)->first();
        $total = PerencanaanSatker::where('id', $data->parent_id)->first();

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
        // dd($data);
        $upper = PerencanaanSatker::where('id', $data->parent_id)->first();
        $up = PerencanaanSatker::where('id', $upper->parent_id)->first();
        $top = PerencanaanSatker::where('id', $up->parent_id)->first();
        $high = PerencanaanSatker::where('id', $top->parent_id)->first();
        $higher = PerencanaanSatker::where('id', $high->parent_id)->first();
        $best = PerencanaanSatker::where('id', $higher->parent_id)->first();

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

        $tot = PerencanaanSatker::where('parent_id', $request->parent_id)->get();
        $b[] = 0;
        foreach($tot as $key){
            $b[] = $key->sisa_pagu;
        }

        $jml = array_sum($b);
        $total->sisa_pagu = $jml;
        $total->update();

        $tot = PerencanaanSatker::where('parent_id', $request->parent_id)->get();
        $b[] = 0;
        foreach($tot as $key){
            $b[] = $key->sisa_pagu;
        }

        $jml = array_sum($b);
        $total->sisa_pagu = $jml;
        $total->update();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function revisisatker (Request $request, $id)
    {
        $rev = PerencanaanSatker::where('id', $id)->first();
        // dd($rev);
        $revtot = PerencanaanSatker::where('id', $rev->parent_id)->first();
        //    dd($revtot);
        $last = PerencanaanSatker::latest()->first();
        $data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();
        if($request->tanggal_revisi != $last->tanggal_revisi) {
        foreach($data as $key){
            $a = $key->replicate();
            $a->save();

            $a->tanggal_revisi = $request->tanggal_revisi;
            $a->pagu_total = 0;
            $a->status = 2;
            $a->update();
                foreach($key->children as $child){
                $ch = PerencanaanSatker::where('id', $a->id)->first();
                $b = $child->replicate();
                $b->save();

                $b->tanggal_revisi = $request->tanggal_revisi;
                $b->parent_id = $ch->id;
                $b->pagu_total = 0;
                $b->status = 2;
                $b->update();
                // dd($a);
                    foreach($child->children as $gchild){
                        $gch = PerencanaanSatker::where('id', $b->id)->first();
                        $c = $gchild->replicate();
                        $c->save();

                        $c->tanggal_revisi = $request->tanggal_revisi;
                        $c->parent_id = $gch->id;
                        $c->pagu_total = 0;
                        $c->status = 2;
                        $c->update();
                            foreach($gchild->children as $ggchild){
                            $ggch = PerencanaanSatker::where('id', $c->id)->first();
                            $d = $ggchild->replicate();
                            $d->save();

                            $d->tanggal_revisi = $request->tanggal_revisi;
                            $d->parent_id = $ggch->id;
                            $d->pagu_total = 0;
                            $d->status = 2;
                            $d->update();
                                foreach($ggchild->children as $zchild){
                                $zch = PerencanaanSatker::where('id', $d->id)->first();
                                $e = $zchild->replicate();
                                $e->save();

                                $e->tanggal_revisi = $request->tanggal_revisi;
                                $e->parent_id = $zch->id;
                                $e->pagu_total = 0;
                                $e->status = 2;
                                $e->update();
                                    foreach($zchild->children as $zzchild){
                                    $zzch = PerencanaanSatker::where('id', $e->id)->first();
                                    $f = $zzchild->replicate();
                                    $f->save();

                                    $f->tanggal_revisi = $request->tanggal_revisi;
                                    $f->parent_id = $zzch->id;
                                    $f->pagu_total = 0;
                                    $f->status = 2;
                                    $f->update();
                                        foreach($zzchild->children as $achild){
                                        $ach = PerencanaanSatker::where('id', $f->id)->first();
                                        if($achild->id == $rev->id) {
                                            $g = $achild->replicate();
                                            $g->save();

                                            $g->jenis_revisi = $request->jenis_revisi;
                                            $g->tanggal_revisi = $request->tanggal_revisi;
                                            $g->pagu_total = $request->pagu_total;
                                            $g->parent_id = $ach->id;
                                            $g->status = 2;
                                            $g->update();

                                            
                                        } else{
                                            $g = $achild->replicate();
                                            $g->save();

                                            $g->jenis_revisi = $request->jenis_revisi;
                                            $g->tanggal_revisi = $request->tanggal_revisi;
                                            $g->parent_id = $ach->id;
                                            $g->status = 2;
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


        return redirect()->route('perencanaansatker.index')->with([
            'rev' => $rev,
        ]);
    }

    public function hapus ($id)
    {
        //hapus parent_id yang sama dengan id
        $PerencanaanSatker = PerencanaanSatker::where('parent_id', $id)->delete();

        $data = PerencanaanSatker::findOrFail($id);
        $data->delete();

        return redirect()->route('perencanaansatker.index')->with(['success' => 'Berhasil menghapus data']);
    }

    public function totalsatker ($id)
    {
        $a = PerencanaanSatker::where('parent_id', $id)->get();
        $total = PerencanaanSatker::where('id', $id)->first();
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
        
        return redirect()->route('perencanaansatker.index')->with(['success' => 'Berhasil menjumlah data']);
    }

    public function simpansatker ()
    {
        $data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->get();
        // dd(collect($data));

        $simpan = DB::table('perencanaan_satker')->update(array('status' => 1));

        return redirect()->back();
        
        

    }
}

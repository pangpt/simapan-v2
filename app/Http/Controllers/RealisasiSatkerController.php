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
use App\RealisasiSatker;
use App\PerencanaanSatker;
use App\Month;
use Carbon\Carbon;

class RealisasiSatkerController extends Controller
{
    public function realisasisatker(Request $request)
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



        $data = RealisasiSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->get();
        // dd($data);
        // dd($menusatu);

        // $total = array_sum($a);
        // dd($total);

        // dd($data);
        $cekbul = $request->bulan;

        return view('satker.realisasi.index',[
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
            'cekbul' => $cekbul,    
        ]);
    }

    public function createrealisasisatker()
    {
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();

        return view('satker.realisasi.create', [
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
        ]);
    }

    public function inputrealisasisatker(Request $request)
    {
        $pro = ProgramSatker::get();
        $program[] = 0;
        foreach($pro as $key){
            $program[] = $key->id;
        }

        $last = PerencanaanSatker::latest()->first();
        // dd($last->tanggal_revisi);
        $perencanaan = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('program_satker_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();


        $data = new RealisasiSatker;
        $data->perencanaan_satker_id = $perencanaan->id;
        $data->satker = $request->satker;
        $data->tanggal_kuitansi = $request->tanggal_kuitansi;
        $data->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
        $data->tanggal_input = Carbon::now()->format('Y-m-d');
        $data->program_satker_id = $request->program_id;
        $data->save();
        

        return redirect()->route('realisasisatker.index')->with([
            'data' => $data,
        ]);
    }

    public function modalKegiatan(Request $request, $id) {
        
        $subkeg = RealisasiSatker::where('id', $id)->first();
        // dd($subkeg);
        $data = new RealisasiSatker;
        $data->parent_id = $id;
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->kegiatan_satker_id = $request->kegiatan_id;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

     public function modalSubkegiatan(Request $request, $id)
    {
        $subkeg = RealisasiSatker::where('id', $id)->first();
        // dd($subkeg);
        $data = new RealisasiSatker;
        $data->parent_id = $id;
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->sub_kegiatan_satker_id = $request->sub_kegiatan_id;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalMenu(Request $request, $id)
    {
        $subkeg = RealisasiSatker::where('id', $id)->first();
        $data = new RealisasiSatker;
        $data->parent_id = $id;
        $data->menu_satker_id = $request->menu_id;
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->save();
        // dd($data);

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalRincian(Request $request, $id)
    {
        $subkeg = RealisasiSatker::where('id', $id)->first();
        $data = new RealisasiSatker;
        $data->parent_id = $id;
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->rincian_satker_id = $request->rincian_id;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalDetil(Request $request, $id)
    {
        $subkeg = RealisasiSatker::where('id', $id)->first();
        $data = new RealisasiSatker;
        $data->parent_id = $id;
        $data->tanggal_kuitansi = $subkeg->tanggal_kuitansi;
        $data->detil_satker_id = $request->detil_id;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $subkeg->tanggal_kuitansi)->isoFormat('MMMM');
        $data->save();

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function modalUraian(Request $request, $id)
    {
        $last = PerencanaanSatker::latest()->first();
        $perencanaan = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->where('program_satker_id', 1)->where('tanggal_revisi', $last->tanggal_revisi)->first();
        $add = RealisasiSatker::where('id', $id)->first();

        $data = new RealisasiSatker;
        $data->perencanaan_satker_id = $perencanaan->id;
        $data->parent_id = $id;
        $data->uraian_satker_id = $request->uraian_id;
        $data->tanggal_kuitansi = $request->tanggal_kuitansi;
        $data->tanggal_input = Carbon::now()->format('Y-m-d'); 
        $data->bulan = Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM');
        $data->jumlah = $request->jumlah;
        $data->penerima = $request->penerima;
        $data->keterangan = $request->keterangan;
        $data->save();

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

        $upper = RealisasiSatker::where('id', $add->parent_id)->first();
        $up = RealisasiSatker::where('id', $upper->parent_id)->first();
        $top = RealisasiSatker::where('id', $up->parent_id)->first();
        $high = RealisasiSatker::where('id', $top->parent_id)->first();
        $higher = RealisasiSatker::where('id', $high->parent_id)->first();
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

        return redirect()->back()->with([
            'data' => $data,
        ]);
    }

    public function editrealsatker(Request $request, $id)
    {
        $rev = RealisasiSatker::where('id', $id)->first();
        $bl = RealisasiSatker::where('id', $rev->parent_id )->first();
        $last = RealisasiSatker::latest()->first();


        if(Carbon::createFromFormat('Y-m-d', $request->tanggal_kuitansi)->isoFormat('MMMM') != Carbon::createFromFormat('Y-m-d', $bl->tanggal_kuitansi)->isoFormat('MMMM')) {
            return redirect()->route('realisasisatker.index')->with('error', 'Tidak bisa edit untuk bulan lain! Silahkan filter bulan terlebih dahulu!');
        } else {
            $rev->tanggal_kuitansi = $request->tanggal_kuitansi;
            $rev->jumlah = $request->jumlah;
            $rev->penerima = $request->penerima;
            $rev->keterangan = $request->keterangan;
            $rev->update();
        }

        return redirect()->route('realisasisatker.index')->with([
            'rev' => $rev,
        ]);
    }

    public function hapus ($id)
    {
        //hapus parent_id yang sama dengan id
        $PerencanaanSatker = RealisasiSatker::where('parent_id', $id)->delete();

        $data = RealisasiSatker::findOrFail($id);
        $data->delete();

        return redirect()->route('realisasisatker.index')->with(['success' => 'Berhasil menghapus data']);
    }

    public function filterrealisasi(Request $request) 
    {
        $bul = $request->bulan;
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $cekbul = $request->bulan;
        $month = Month::get();

        if(empty($request->bulan)){
            $data = RealisasiSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('uraian','asc')->get();
        } else {
            
            $data = RealisasiSatker::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('uraian','asc')
            ->where('bulan', $request->bulan)
            ->get();
        }

        return view('satker.realisasi.index')->with([
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
            'cekbul' => $cekbul
        ]);
    }
}

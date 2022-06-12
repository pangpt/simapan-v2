<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Realisasi;
use App\ProgramSatker;
use App\KegiatanSatker;
use App\SubKegiatanSatker;
use App\MenuSatker;
use App\RincianSatker;
use App\DetilSatker;
use App\UraianSatker;
use App\RealisasiSatker;
use App\PerencanaanSatker;
use DB;
use Carbon\Carbon;
use PDF;


class HomeController extends Controller
{
    //
    public function landing()
    {
        return view('landing.landing');
    }
    public function deviasi()
    {
        return view('guest.deviasi');
    }
    public function simulasi()
    {
        return view('guest.simulasi');
    }
    public function sisapagu()
    {
        return view('guest.sisapagu');
    }

    public function deviasisatker()
    {
        return view('guest.deviasisatker');
    }
    public function simulasisatker()
    {
        return view('guest.simulasisatker');
    }
    public function sisapagusatker()
    {
        return view('guest.sisapagusatker');
    }


    public function simapan()
    {
        return view('guest.simapan');
    }
    public function index(Request $request)
    {
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();

        $tanggal = Plan::where('parent_id', 0)->where('menu_id', 1)->get();

        $cektgl = $request->tanggal_revisi;

        $last = Plan::latest()->first();
        @$data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();        // dd($data->toArray());
        $month = Month::get();

        // dd($month);

        return view('guest.index')->with([
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
            'month' => $month,
            'tanggal' => $tanggal,
            'cektgl' => $cektgl,
            'last' => $last,
        ]);
    }

    public function perencanaansatker(Request $request)
    {
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();

        $tanggal = PerencanaanSatker::where('parent_id', 0)->where('program_satker_id', 1)->get();

        $cektgl = $request->tanggal_revisi;


        $last = PerencanaanSatker::latest()->first();
        @$data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();        // dd($data->toArray());
        // $data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->get();
        // dd($data->toArray());

        // dd($month);

        return view('guest.rencanasatker')->with([
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
            'cektgl' => $cektgl,
            'tanggal' => $tanggal,
            'last' => $last,
        ]);
    }

    public function realisasi(Request $request)
    {
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $month = Month::get();
        $cekbul = $request->bulan;

        // dd($month);
        // 

        // $coba = Plan::where('plans.parent_id', 0)->with('children.children.children.children.children.children')->where('tanggal_revisi', $last->tanggal_revisi)->join('realisasis', 'realisasis.plan_id', '=', 'plans.id')->get();
        // dd($coba);
        $last = Carbon::now()->isoFormat('MMMM');
        @$data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('bulan', $last )->get();



        return view('guest.realisasi', [
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'month' => $month,
            'cekbul' => $cekbul,
            // 'coba' => $coba,
        ]);
    }

    public function realisasisatker(Request $request)
    {
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();
        $cekbul = $request->bulan;

        $data = RealisasiSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->get();

        return view('guest.realisasisatker', [
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


    public function filter(Request $request)
    {
        // $tgl = $request->tanggal_revisi;
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $last = Plan::latest()->first();
        $cektgl = $request->tanggal_revisi;

        $tanggal= Plan::where('parent_id', 0)->where('menu_id', 1)->get();

        $month = Month::get();

        if(empty($request->tanggal_revisi)){
            $data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();
        } else {
            $data = Plan::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('menu_id','asc')
            ->where('tanggal_revisi', $request->tanggal_revisi)
            ->get();
        }

        return view('guest.index')->with([
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
            'last' => $last,
            'cektgl' => $cektgl,
            'tanggal' => $tanggal,
        ]);
    }

    public function filterreal(Request $request)
    {
        $tgl = $request->bulan;
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $cekbul = $request->bulan;

        $month = Month::get();

        if(empty($request->bulan)){
            $data = Realisasi::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->get();
        } else {
            $data = Realisasi::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('menu_id','asc')
            ->where('bulan', $request->bulan)
            ->get();
        }

        return view('guest.realisasi')->with([
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

    public function filterrealsatker(Request $request)
    {
        $tgl = $request->bulan;
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $cekbul = $request->bulan;

        $month = Month::get();

        if(empty($request->bulan)){
            $data = RealisasiSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->get();
        } else {
            $data = RealisasiSatker::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('program_satker_id','asc')
            ->where('bulan', $request->bulan)
            ->get();
        }

        return view('guest.realisasisatker')->with([
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

    public function filtersatker(Request $request)
    {
        // $tgl = $request->tanggal_revisi;
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();
        $cektgl = $request->tanggal_revisi;

        $tanggal= PerencanaanSatker::where('parent_id', 0)->where('program_satker_id', 1)->get();

        $last = PerencanaanSatker::latest()->first();
        @$data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();        // dd($data->toArray());
        
        
        if(empty($request->tanggal_revisi)){
            $data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();
        } else {
            $data = PerencanaanSatker::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('program_satker_id','asc')
            ->where('tanggal_revisi', $request->tanggal_revisi)
            ->get();
        }

        return view('guest.rencanasatker')->with([
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
            'last' => $last,
            'cektgl' => $cektgl,
            'tanggal' => $tanggal,
        ]);

        $month = Month::get();

        if(empty($request->tanggal_revisi)){
            $data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->get();
        } else {
            $data = PerencanaanSatker::
            where('parent_id', 0)
            ->with('children.children.children.children.children.children')
            ->orderBy('program_satker_id','asc')
            ->where('tanggal_revisi', $request->tanggal_revisi)
            ->get();
        }

        return view('guest.index')->with([
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
        ]);
    }

    public function perencanaan_pdf(Request $request)
    {
        // dd($request->all());
        $submenu = Submenu::get();
        $category = Category::get();
        $subcat = Subcat::get();
        $kegiatan = Kegiatan::get();
        $sub_kegiatan = Sub_kegiatan::get();
        $rincian = Rincian::get();
        $last = Plan::latest()->first();

        if(empty($request->tanggal_revisi)) {
            @$data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();        // dd($data->toArray());
            $month = Month::get();
        }else {
            @$data = Plan::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('menu_id','asc')->where('tanggal_revisi', $request->tanggal_revisi)->get();        // dd($data->toArray());
            $month = Month::get();
        }
        // dd($data);

        $pdf = PDF::loadview('cetak.perencanaan_307509_pdf', [
            'data' => $data,
            'submenu' => $submenu,
            'category' => $category,
            'subcat' => $subcat,
            'kegiatan' => $kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'rincian' => $rincian,
            'month' => $month,
        ])->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function perencanaansatker_pdf(Request $request)
    {
        // dd($request->all());
        $programsatker = ProgramSatker::get();
        $kegiatansatker = KegiatanSatker::get();
        $subkegiatansatker = SubKegiatanSatker::get();
        $menusatker = MenuSatker::get();
        $rinciansatker = RincianSatker::get();
        $detilsatker = DetilSatker::get();
        $uraiansatker = UraianSatker::get();
        $month = Month::get();
        $last = PerencanaanSatker::latest()->first();

        if(empty($request->tanggal_revisi)) {
            @$data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->where('tanggal_revisi', $last->tanggal_revisi)->get();        // dd($data->toArray());
            $month = Month::get();
        }else {
            @$data = PerencanaanSatker::where('parent_id', 0)->with('children.children.children.children.children.children')->orderBy('program_satker_id','asc')->where('tanggal_revisi', $request->tanggal_revisi)->get();        // dd($data->toArray());
            $month = Month::get();
        }
        // dd($data);

        $pdf = PDF::loadview('cetak.perencanaan_309076_pdf', [
            'data' => $data,
            'programsatker' => $programsatker,
            'kegiatansatker' => $kegiatansatker,
            'subkegiatansatker' => $subkegiatansatker,
            'menusatker' => $menusatker,
            'rinciansatker' => $rinciansatker,
            'detilsatker' => $detilsatker,
            'uraiansatker' => $uraiansatker,
            'month' => $month,
        ])->setPaper('A4','landscape');
        return $pdf->stream();
    }

}

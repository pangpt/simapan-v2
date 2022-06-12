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

class MasterSatkerController extends Controller
{
    //
    public function program()
    {
        $data = ProgramSatker::get();

        return view('master_b.program.index', [
            'data' => $data,
        ]);
    }

    public function createprogram()
    {
        return view('master_b.program.create');
    }

    public function inputprogram(Request $request)
    {
        $data = new ProgramSatker;
        $data->kode_program = $request->kode_program;
        $data->nama_program = $request->nama_program;
        $data->save();

        return redirect()->route('program.index')->with([
            'data' => $data
        ]);

    }

    public function kegiatan()
    {
        $data = KegiatanSatker::get();

        return view('master_b.kegiatan.index', [
            'data' => $data,
        ]);
    }

    public function createkegiatan()
    {
        $program_satker = ProgramSatker::get();

        return view('master_b.kegiatan.create',[
            'program_satker' => $program_satker,
        ]);
    }

    public function inputkegiatan(Request $request)
    {
        $data = new KegiatanSatker;
        $data->program_satker_id = $request->program_satker_id;
        $data->kode_kegiatan = $request->kode_kegiatan;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->save();

        return redirect()->route('kegiatan.index')->with([
            'data' => $data,
        ]);
    }

    public function subkegiatan()
    {
        $data = SubKegiatanSatker::get();
        // dd($data);

        return view('master_b.subkegiatan.index',[
            'data' => $data,
        ]);
    }

    public function createsubkegiatan()
    {
        $kegiatan = Kegiatan::get();

        return view('master_b.subkegiatan.create',[
            'kegiatan' => $kegiatan,
        ]);
    }

    public function inputsubkegiatan(Request $request)
    {
        $data = new SubKegiatanSatker;
        $data->kegiatan_satker_id = $request->kegiatan_satker_id;
        $data->kode_subkegiatan = $request->kode_subkegiatan;
        $data->nama_subkegiatan = $request->nama_subkegiatan;
        $data->save();

        return redirect()->route('subkegiatan.index')->with([
            'data' => $data,
        ]);
    }

    public function menu()
    {
        $data = MenuSatker::get();

        return view('master_b.menu.index',[
            'data' => $data,
        ]);
    }

    public function rincian()
    {
        $data = RincianSatker::get();

        return view('master_b.rincian.index',[
            'data' => $data,
        ]);
    }

    public function detil()
    {
        $data = DetilSatker::get();

        return view('master_b.detil.index',[
            'data' => $data,
        ]);
    }

    public function uraian()
    {
        $data = UraianSatker::get();

        return view('master_b.uraian.index',[
            'data' => $data,
        ]);
    }
}

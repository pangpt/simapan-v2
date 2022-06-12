<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/loginpage', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@login')->name('login');

Route::get('/', 'HomeController@simapan')->name('simapan.index');
// Route::get('/', 'HomeController@index')->name('home.index');

//filter
Route::get('/homeperencanaan/filter', 'HomeController@filter')->name('filter');
Route::get('/real/filter', 'HomeController@filterreal')->name('filterreal');
Route::get('/realsatker/filter', 'HomeController@filterrealsatker')->name('filterrealsatker');


Route::get('/real', 'HomeController@realisasi')->name('home.realisasi');
Route::get('/homeperencanaan', 'HomeController@index')->name('home.perencanaan');
Route::get('/homeperencanaan/cetak_perencanaan', 'HomeController@perencanaan_pdf')->name('perencanaan.cetak');
Route::get('/perencenaansatker/cetak_perencanaan', 'HomeController@perencanaansatker_pdf')->name('perencanaansatker.cetak');
Route::get('/perencanaansatker', 'HomeController@perencanaansatker')->name('perencanaansatker');
Route::get('/realsatker', 'HomeController@realisasisatker')->name('realisasisatker');
Route::get('/deviasi', 'HomeController@deviasi')->name('deviasi.page');
Route::get('/sisapagu', 'HomeController@sisapagu')->name('sisapagu.page');
Route::get('/simulasi', 'HomeController@simulasi')->name('simulasi.page');

Route::get('/deviasi/309076', 'HomeController@deviasisatker')->name('deviasi.satker');
Route::get('/sisapagu/309076', 'HomeController@sisapagusatker')->name('sisapagu.satker');
Route::get('/simulasi/309076', 'HomeController@simulasisatker')->name('simulasi.satker');

Route::get('/perencanaansatker/filter','HomeController@filtersatker')->name('filtersatker');
Route::get('/landing', 'HomeController@landing')->name('landing.page');
Route::group(['middleware' => 'ceklogin'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::prefix('master')->group(function () {
    Route::get('/menu', 'MasterController@menu')->name('menu.index');
    Route::get('/menu/create', 'MasterController@createMenu')->name('menu.create');
    Route::post('/menu/input', 'MasterController@inputMenu')->name('menu.input');

    Route::get('/submenu', 'MasterController@submenu')->name('submenu.index');
    Route::get('/submenu/create', 'MasterController@createSubmenu')->name('submenu.create');
    Route::post('/submenu/input', 'MasterController@inputSubmenu')->name('submenu.input');

    Route::get('/subcat', 'MasterController@subcat')->name('subcat.index');
    Route::get('/subcat/create', 'MasterController@createSubcat')->name('subcat.create');
    Route::post('/subcat/input', 'MasterController@inputSubcat')->name('subcat.input');

    Route::get('/kategori', 'MasterController@category')->name('kategori.index');
    Route::get('/kategori/create', 'MasterController@createCat')->name('kategori.create');
    Route::post('/kategori/input', 'MasterController@inputCat')->name('kategori.input');

    Route::get('/kegiatan', 'MasterController@kegiatan')->name('kegiatan.index');
    Route::get('/kegiatan/create', 'MasterController@createKegiatan')->name('kegiatan.create');
    Route::post('/kegiatan/input', 'MasterController@inputKegiatan')->name('kegiatan.input');

    Route::get('/subkegiatan', 'MasterController@subkegiatan')->name('subkegiatan.index');
    Route::get('/subkegiatan/create', 'MasterController@createSubkegiatan')->name('subkegiatan.create');
    Route::post('/subkegiatan/input', 'MasterController@inputSubkegiatan')->name('subkegiatan.input');

    Route::get('/rincian', 'MasterController@rincian')->name('rincian.index');
    Route::get('/rincian/create', 'MasterController@createRincian')->name('rincian.create');
    Route::post('/rincian/input', 'MasterController@inputRincian')->name('rincian.input');
});
Route::prefix('master_satker')->group(function () {
    Route::get('/program', 'MasterSatkerController@program')->name('program.index');
    Route::get('/program/create', 'MasterSatkerController@createprogram')->name('program.create');
    Route::post('/program/input', 'MasterSatkerController@inputprogram')->name('program.input');

    Route::get('/kegiatan', 'MasterSatkerController@kegiatan')->name('kegiatan.index');
    Route::get('/kegiatan/create', 'MasterSatkerController@createkegiatan')->name('kegiatan.create');
    Route::post('/kegiatan/input', 'MasterSatkerController@inputkegiatan')->name('kegiatan.input');

    Route::get('/subkegiatan', 'MasterSatkerController@subkegiatan')->name('subkegiatan.index');
    Route::get('/subkegiatan/create', 'MasterSatkerController@createsubkegiatan')->name('subkegiatansatker.create');
    Route::post('/subkegiatan/input', 'MasterSatkerController@inputsubkegiatan')->name('subkegiatan.input');

    Route::get('/menu', 'MasterSatkerController@menu')->name('menu.index');
    Route::get('/menu/create', 'MasterSatkerController@createmenu')->name('menu.create');
    Route::post('/menu/input', 'MasterSatkerController@inputmenu')->name('menu.input');

    Route::get('/rincian', 'MasterSatkerController@rincian')->name('rinciansatker.index');
    Route::get('/rincian/create', 'MasterSatkerController@createrincian')->name('rinciansatker.create');
    Route::post('/rincian/input', 'MasterSatkerController@inputrincian')->name('rinciansatker.input');

    Route::get('/detil', 'MasterSatkerController@detil')->name('detil.index');
    Route::get('/detil', 'MasterSatkerController@detil')->name('detil.index');
    Route::get('/detil', 'MasterSatkerController@detil')->name('detil.index');
    Route::get('/detil/create', 'MasterSatkerController@createdetil')->name('detil.create');
    Route::post('/detil/input', 'MasterSatkerController@inputdetil')->name('detil.input');

    Route::get('/uraian', 'MasterSatkerController@uraian')->name('uraian.index');
    Route::get('/uraian/create', 'MasterSatkerController@createuraian')->name('uraian.create');
    Route::post('/uraian/input', 'MasterSatkerController@inputuraian')->name('uraian.input');
});

Route::prefix('satker')->group(function () {
    Route::get('/perencanaan', 'PerencanaanSatkerController@perencanaansatker')->name('perencanaansatker.index');
    Route::post('/perencanaan/input', 'PerencanaanSatkerController@inputperencanaansatker')->name('perencanaansatker.input');
    Route::get('/perencanaan/create', 'PerencanaanSatkerController@createperencanaansatker')->name('perencanaansatker.create');

    Route::get('/realisasi', 'RealisasiSatkerController@realisasisatker')->name('realisasisatker.index');
    Route::post('/realisasi/input', 'RealisasiSatkerController@inputrealisasisatker')->name('realisasisatker.input');
    Route::get('/realisasi/create', 'RealisasiSatkerController@createrealisasisatker')->name('realisasisatker.create');

    Route::post('/kegiatanplan/{id}', 'PerencanaanSatkerController@modalKegiatan')->name('kegiatansatker.modal');
    Route::post('/subplan/{id}', 'PerencanaanSatkerController@modalSubKegiatan')->name('subkegiatansatker.modal');
    Route::post('/menu/{id}', 'PerencanaanSatkerController@modalMenu')->name('menusatker.modal');
    Route::post('/rincian/{id}', 'PerencanaanSatkerController@modalRincian')->name('rinciansatker.modal');
    Route::post('/detil/{id}', 'PerencanaanSatkerController@modalDetil')->name('detilsatker.modal');
    Route::post('/uraian/{id}', 'PerencanaanSatkerController@modalUraian')->name('uraiansatker.modal');

    Route::post('/penarikansatker/{id}', 'PerencanaanSatkerController@penarikansatker')->name('penarikansatker');
    Route::post('/revisisatker/{id}', 'PerencanaanSatkerController@revisisatker')->name('revisisatker');

    Route::post('/kegiatanreal/{id}', 'RealisasiSatkerController@modalKegiatan')->name('kegiatansatker.real');
    Route::post('/subreal/{id}', 'RealisasiSatkerController@modalSubKegiatan')->name('subkegiatansatker.real');
    Route::post('/menureal/{id}', 'RealisasiSatkerController@modalMenu')->name('menusatker.real');
    Route::post('/rincianreal/{id}', 'RealisasiSatkerController@modalRincian')->name('rinciansatker.real');
    Route::post('/detilreal/{id}', 'RealisasiSatkerController@modalDetil')->name('detilsatker.real');
    Route::post('/uraianreal/{id}', 'RealisasiSatkerController@modalUraian')->name('uraiansatker.real');

    Route::post('/editreal/{id}', 'RealisasiSatkerController@editreal')->name('real.edit');

    Route::get('/hapusrenc/{id}', 'PerencanaanSatkerController@hapus')->name('hapussatker');
    Route::get('/totalsatker/{id}', 'PerencanaanSatkerController@totalsatker')->name('totalsatker');
    Route::get('/hapusdata/{id}', 'RealisasiSatkerController@hapus')->name('hapusrealsatker');

    Route::post('/simpansatker', 'PerencanaanSatkerController@simpansatker')->name('simpansatker');
    

});

Route::get('/perencanaan', 'PerencanaanController@perencanaan')->name('perencanaan.index');
Route::get('/perencanaan/create', 'PerencanaanController@createPerencanaan')->name('perencanaan.create');
Route::post('/perencanaan/input','PerencanaanController@inputPerencanaan')->name('perencanaan.input');
Route::get('/data', 'PerencanaanController@getData')->name('get.data');

Route::get('/plan', 'PerencanaanController@plan' )->name('plan.index');
Route::get('/plan/create', 'PerencanaanController@createPlan' )->name('plan.create');
Route::post('/plan/input', 'PerencanaanController@inputPlan' )->name('plan.input');

// Route::get('/modalSubmenu/{id}', 'PerencanaanController@modalSubmenu')->name('submenu.modal');
Route::post('/submenuplan/{id}', 'PerencanaanController@modalSubmenu')->name('submenu.modal');
Route::post('/catplan/{id}', 'PerencanaanController@modalKategori')->name('kategori.modal');
Route::post('/subcatplan/{id}', 'PerencanaanController@modalSubcat')->name('subcat.modal');
Route::post('/kegplan/{id}', 'PerencanaanController@modalKegiatan')->name('kegplan.modal');
Route::post('/subkegplan/{id}', 'PerencanaanController@modalSubkegiatan')->name('subkegplan.modal');
Route::post('/rincianplan/{id}', 'PerencanaanController@modalRincian')->name('rincian.modal');

Route::post('/penarikan/{id}', 'PerencanaanController@penarikan')->name('penarikan');

Route::get('hapusdata/{id}', 'PerencanaanController@hapus')->name('hapusdata');
Route::get('totaldetil/{id}', 'PerencanaanController@total')->name('totaldetil');
Route::post('simpanrencana', 'PerencanaanController@simpanrencana')->name('simpanrencana');
Route::post('/revisi/{id}', 'PerencanaanController@revisi')->name('perencanaan.revisi');

//realisasi

Route::get('/realisasi','RealisasiController@index')->name('realisasi.index');
Route::get('/realisasi/create','RealisasiController@createRealisasi')->name('realisasi.create');
Route::post('/realisasi/input','RealisasiController@inputRealisasi')->name('realisasi.input');

Route::post('/submenureal/{id}', 'RealisasiController@modalSubmenu')->name('submenu.real');
Route::post('/catreal/{id}', 'RealisasiController@modalKategori')->name('kategori.real');
Route::post('/subcatreal/{id}', 'RealisasiController@modalSubcat')->name('subcat.real');
Route::post('/kegreal/{id}', 'RealisasiController@modalKegiatan')->name('kegreal');
Route::post('/subkegreal/{id}', 'RealisasiController@modalSubkegiatan')->name('subkegreal');
Route::post('/rincianreal/{id}', 'RealisasiController@modalRincian')->name('rincian.real');
Route::get('hapusdatareal/{id}', 'RealisasiController@hapus')->name('hapusdatareal');
Route::get('/totalreal/{id}', 'RealisasiController@totalreal')->name('totalreal');

Route::get('/realisasi/filterrealiasi','RealisasiController@filterrealisasi')->name('filter.realisasi');
Route::post('/editrealisasi/{id}', 'RealisasiController@editrealisasi')->name('edit.realisasi');

Route::get('/realisasi/filterreal','RealisasiSatkerController@filterrealisasi')->name('filter.realisasisatker');

Route::post('/editrealsatker/{id}', 'RealisasiSatkerController@editrealsatker')->name('edit.realsatker');

// Route::get('/filter','HomeController@filter')->name('filter');

Route::get('/logout', 'LoginController@logout')->name('logout');
//add
});

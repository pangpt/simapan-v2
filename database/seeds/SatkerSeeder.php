<?php

use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = \Carbon\Carbon::now();

        DB::table('program_satker')->insert([
            ['kode_program' => '005.04.BF',  'nama_program' => 'Program Penegakan dan Pelayanan Hukum','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('kegiatan_satker')->insert([
            ['program_satker_id' => '1','kode_kegiatan' => '1053',  'nama_kegiatan' => 'Peningkatan Manajemen Peradilan Agama','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('sub_kegiatan_satker')->insert([
            ['kegiatan_satker_id' => '1','kode_subkegiatan' => '1053.QBA',  'nama_subkegiatan' => 'Layanan Bantuan Hukum Perseorangan','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('menu_kegiatan_satker')->insert([
            ['sub_kegiatan_satker_id' => '1', 'kode_menu' => '1053.QBA.001',  'nama_menu' => 'Perkara di Lingkungan Peradilan Agama yang diselesaikan melalui pembebasan biaya perkara', 'created_at' => $now, 'updated_at' => $now],

            ['sub_kegiatan_satker_id' => '1','kode_menu' => '1053.QBA.002',  'nama_menu' => 'Perkara di Lingkungan Peradilan Agama yang diselesaikan melalui sidang di luar gedung','created_at' => $now, 'updated_at' => $now],

            ['sub_kegiatan_satker_id' => '1','kode_menu' => '1053.QBA.003',  'nama_menu' => 'Layanan bantuan hukum di Lingkungan Peradilan Agama','created_at' => $now, 'updated_at' => $now],

            ['sub_kegiatan_satker_id' => '1','kode_menu' => '1053.QBA.004',  'nama_menu' => 'Perkara di Lingkungan Peradilan Agama yang diselesaikan melalui sidang terpadu','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('rincian_satker')->insert([
            ['menu_kegiatan_satker_id' => '1','kode_rincian' => '051',  'nama_rincian' => 'Pembebasan Biaya Perkara','created_at' => $now, 'updated_at' => $now],
            ['menu_kegiatan_satker_id' => '2','kode_rincian' => '051',  'nama_rincian' => 'Sidang di Luar Gedung Pengadilan','created_at' => $now, 'updated_at' => $now],
            ['menu_kegiatan_satker_id' => '3','kode_rincian' => '051',  'nama_rincian' => 'Pos Bantuan Hukum','created_at' => $now, 'updated_at' => $now],
            ['menu_kegiatan_satker_id' => '4','kode_rincian' => '051',  'nama_rincian' => 'Layanan Sidang Terpadu','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('detil_satker')->insert([
            ['rincian_satker_id' => '0','kode_detil' => '521219',  'nama_detil' => 'Belanja Barang Non Operasional Lainnya','created_at' => $now, 'updated_at' => $now],
            ['rincian_satker_id' => '0','kode_detil' => '524113',  'nama_detil' => 'Belanja Perjalanan Dinas Dalam Kota','created_at' => $now, 'updated_at' => $now],
            ['rincian_satker_id' => '0','kode_detil' => '521213',  'nama_detil' => 'Belanja Honor Output Kegiatan','created_at' => $now, 'updated_at' => $now],
            ['rincian_satker_id' => '0','kode_detil' => '522131',  'nama_detil' => 'Belanja Jasa Konsultan','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('uraian_satker')->insert([
            ['kode_uraian' => '-', 'nama_uraian' => 'bantuan Pembebasan Panjar Biaya Perkara', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Biaya Uang Kebersihan', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Uang Harian', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Transportasi', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Honor Pejabat Panitia Pengadaan Barang Jasa', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Jasa Konsultan Hukum POSBAKUM', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Uang Harian', 'created_at' => $now, 'updated_at' => $now],
            ['kode_uraian' => '-', 'nama_uraian' => 'Transportasi' , 'created_at' => $now, 'updated_at' => $now],
        ]);

    }
}

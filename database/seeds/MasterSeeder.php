<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
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

        DB::table('menus')->insert([
            ['kode_menu' => '1066',  'nama_menu' => 'Pembinaan Administrasi dan Pengelolaan Keuangan Badan Urusan Administrasi','created_at' => $now, 'updated_at' => $now],
            ['kode_menu' => '1071',  'nama_menu' => 'Pengadaan Sarana dan Prasarana di Lingkungan Mahkamah Agung','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('submenus')->insert([
            ['menu_id' => '1','kode_submenu' => '1066.EAA',  'nama_submenu' => 'Layanan Perkantoran','created_at' => $now, 'updated_at' => $now],
            ['menu_id' => '1','kode_submenu' => '1066.EAC',  'nama_submenu' => 'Layanan Umum','created_at' => $now, 'updated_at' => $now],
            ['menu_id' => '2','kode_submenu' => '1071.EAD',  'nama_submenu' => 'Layanan Sarana Internal','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('categories')->insert([
            ['submenu_id' => '1','kode_kategori' => '1066.EAA.001',  'nama_kategori' => 'Layanan Perkantoran','created_at' => $now, 'updated_at' => $now],
            ['submenu_id' => '2','kode_kategori' => '1066.EAC.003',  'nama_kategori' => 'Layanan Dukungan Manajemen Pengadilan','created_at' => $now, 'updated_at' => $now],
            ['submenu_id' => '3','kode_kategori' => '1071.EAD.001',  'nama_kategori' => 'Layanan Sarana Internal','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('subcats')->insert([
            ['category_id' => '1','kode_subcat' => '001',  'nama_subcat' => 'Gaji dan Tunjangan','created_at' => $now, 'updated_at' => $now],
            ['category_id' => '1','kode_subcat' => '002',  'nama_subcat' => 'Operasional dan Pemeliharaan Kantor','created_at' => $now, 'updated_at' => $now],
            ['category_id' => '2','kode_subcat' => '052',  'nama_subcat' => 'Non Operasional Satker Daerah','created_at' => $now, 'updated_at' => $now],
            ['category_id' => '3','kode_subcat' => '052',  'nama_subcat' => 'Pengadaan Perangkat Pengolah Data dan Komunikasi','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('kegiatan')->insert([
            ['subcat_id' => '1','kode_kegiatan' => 'A',  'nama_kegiatan' => 'Pembayaran Gaji dan Tunjangan','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'A',  'nama_kegiatan' => 'Kebutuhan Sehari-hari Perkantoran','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'B',  'nama_kegiatan' => 'LANGGANAN DAYA DAN JASA','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'C',  'nama_kegiatan' => 'PEMELIHARAAN KANTOR','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'D',  'nama_kegiatan' => 'PEMBAYARAN TERKAIT PELAKSANAAN OPERASIONAL','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'E',  'nama_kegiatan' => 'PELANTIKAN DAN SUMPAH JABATAN','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'F',  'nama_kegiatan' => 'RAPAT KOORDINASI INTERNAL','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'G',  'nama_kegiatan' => 'KONSULTASI KE TINGKAT BANDING','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'H',  'nama_kegiatan' => 'KONSULTASI KE KANWIL DJPb/KPKNL','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'I',  'nama_kegiatan' => 'HAK KEUANGAN DAN FASILITAS HAKIM','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '2','kode_kegiatan' => 'J',  'nama_kegiatan' => 'PENANGGULANGAN COVID 19','created_at' => $now, 'updated_at' => $now],

            ['subcat_id' => '3','kode_kegiatan' => 'A',  'nama_kegiatan' => 'Penanganan COVID-19 - Non OPS','created_at' => $now, 'updated_at' => $now],

            ['subcat_id' => '4','kode_kegiatan' => 'A',  'nama_kegiatan' => 'PC Kepaniteraan','created_at' => $now, 'updated_at' => $now],
            ['subcat_id' => '4','kode_kegiatan' => 'B',  'nama_kegiatan' => 'Mesin Antrian Sidang','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('sub_kegiatan')->insert([
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511111',  'nama_sub_kegiatan' => 'Belanja Gaji Pokok PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511119',  'nama_sub_kegiatan' => 'Belanja Pembulatan Gaji PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511121',  'nama_sub_kegiatan' => 'Belanja Tunj. Suami/Istri PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511122',  'nama_sub_kegiatan' => 'Belanja Tunj. Anak PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511123',  'nama_sub_kegiatan' => 'Belanja Tunj. Struktural PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511124',  'nama_sub_kegiatan' => 'Belanja Tunj. Fungsional PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511125',  'nama_sub_kegiatan' => 'Belanja Tunj. PPh PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511126',  'nama_sub_kegiatan' => 'Belanja Tunj. Beras PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511129',  'nama_sub_kegiatan' => 'Belanja Uang Makan PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511151',  'nama_sub_kegiatan' => 'Belanja Tunjangan Umum PNS','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '511157',  'nama_sub_kegiatan' => 'Belanja Tunjangan Kemahalan Hakim','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521119',  'nama_sub_kegiatan' => 'Belanja Barang Operasional Lainnya','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521811',  'nama_sub_kegiatan' => 'Belanja Barang Persediaan Barang Konsumsi','created_at' => $now, 'updated_at' => $now],

            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521111',  'nama_sub_kegiatan' => 'Belanja Keperluan Perkantoran','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521114',  'nama_sub_kegiatan' => 'Belanja Pengiriman Surat Dinas Pos Pusat','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '522111',  'nama_sub_kegiatan' => 'Belanja Langganan Listrik','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '522112',  'nama_sub_kegiatan' => 'Belanja Langganan Telepon','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '522113',  'nama_sub_kegiatan' => 'Belanja Langganan Air','created_at' => $now, 'updated_at' => $now],

            ['kegiatan_id' => '0','kode_sub_kegiatan' => '523111',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Gedung dan Bangunan','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '523119',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Gedung dan Bangunan Lainnya','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '523121',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Peralatan dan Mesin','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521115',  'nama_sub_kegiatan' => 'Belanja Honor Operasional Satuan Kerja','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '524111',  'nama_sub_kegiatan' => 'Belanja Perjalanan Dinas Biasa','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '522141',  'nama_sub_kegiatan' => 'Belanja Sewa','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '521131',  'nama_sub_kegiatan' => 'Belanja Barang Non Operasional - Penanganan Pandemi COVID-19','created_at' => $now, 'updated_at' => $now],
            ['kegiatan_id' => '0','kode_sub_kegiatan' => '532111',  'nama_sub_kegiatan' => 'Belanja Modal Peralatan dan Mesin','created_at' => $now, 'updated_at' => $now],
		]);

        DB::table('rincian')->insert([
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Gaji Pokok PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Gaji Pokok PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Gaji Pokok PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Pembulatan Gaji PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Pembulatan Gaji PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Pembulatan Gaji PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Suami/Istri PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Suami/Istri PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Suami/Istri PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Anak PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Anak PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Anak PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Struktural PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Struktural PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Struktural PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Fungsional PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Fungsional PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. Fungsional PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. PPh PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. PPh PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunj. PPh PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunjangan Umum PNS', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunjangan Umum PNS (Gaji ke-13)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Belanja Tunjangan Umum PNS (Gaji ke-14)', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'THR Satpam', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'THR Pramubakti', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'THR Pengemudi', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Pengemudi', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Satpam', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Pramubakti', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Langgan Surat Kabar/Berita/Majalah', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Air Minum/Galon', 'created_at' => $now, 'updated_at' => $now],
            ['sub_kegiatan_id' => '0', 'nama_rincian' => 'Biaya Penjilidan/Cetak/Cek', 'created_at' => $now, 'updated_at' => $now],
        ]);

        // DB::table('sub_kegiatan')->insert([
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511111',  'nama_sub_kegiatan' => 'Belanja Gaji Pokok PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511119',  'nama_sub_kegiatan' => 'Belanja Pembulatan Gaji PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511121',  'nama_sub_kegiatan' => 'Belanja Tunj. Suami/Istri PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511122',  'nama_sub_kegiatan' => 'Belanja Tunj. Anak PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511123',  'nama_sub_kegiatan' => 'Belanja Tunj. Struktural PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511124',  'nama_sub_kegiatan' => 'Belanja Tunj. Fungsional PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511125',  'nama_sub_kegiatan' => 'Belanja Tunj. PPh PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511126',  'nama_sub_kegiatan' => 'Belanja Tunj. Beras PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511129',  'nama_sub_kegiatan' => 'Belanja Uang Makan PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511151',  'nama_sub_kegiatan' => 'Belanja Tunjangan Umum PNS','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '1','kode_sub_kegiatan' => '511157',  'nama_sub_kegiatan' => 'Belanja Tunjangan Kemahalan Hakim','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '0','kode_sub_kegiatan' => '521111',  'nama_sub_kegiatan' => 'Belanja Keperluan Perkantoran','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '2','kode_sub_kegiatan' => '521119',  'nama_sub_kegiatan' => 'Belanja Barang Operasional Lainnya','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '2','kode_sub_kegiatan' => '521811',  'nama_sub_kegiatan' => 'Belanja Barang Persediaan Barang Konsumsi','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '3','kode_sub_kegiatan' => '521111',  'nama_sub_kegiatan' => 'Belanja Keperluan Perkantoran','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '3','kode_sub_kegiatan' => '521114',  'nama_sub_kegiatan' => 'Belanja Pengiriman Surat Dinas Pos Pusat','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '3','kode_sub_kegiatan' => '522111',  'nama_sub_kegiatan' => 'Belanja Langganan Listrik','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '3','kode_sub_kegiatan' => '522112',  'nama_sub_kegiatan' => 'Belanja Langganan Telepon','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '3','kode_sub_kegiatan' => '522113',  'nama_sub_kegiatan' => 'Belanja Langganan Air','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '4','kode_sub_kegiatan' => '523111',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Gedung dan Bangunan','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '4','kode_sub_kegiatan' => '523119',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Gedung dan Bangunan Lainnya','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '4','kode_sub_kegiatan' => '523121',  'nama_sub_kegiatan' => 'Belanja Pemeliharaan Peralatan dan Mesin','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '5','kode_sub_kegiatan' => '521115',  'nama_sub_kegiatan' => 'Belanja Honor Operasional Satuan Kerja','created_at' => $now, 'updated_at' => $now],
        //     ['kegiatan_id' => '5','kode_sub_kegiatan' => '521119',  'nama_sub_kegiatan' => 'Belanja Barang Operasional Lainnya','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '6','kode_sub_kegiatan' => '521119',  'nama_sub_kegiatan' => 'Belanja Barang Operasional Lainnya','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '7','kode_sub_kegiatan' => '521119',  'nama_sub_kegiatan' => 'Belanja Barang Operasional Lainnya','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '8','kode_sub_kegiatan' => '524111',  'nama_sub_kegiatan' => 'Belanja Perjalanan Dinas Biasa','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '9','kode_sub_kegiatan' => '524111',  'nama_sub_kegiatan' => 'Belanja Perjalanan Dinas Biasa','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '10','kode_sub_kegiatan' => '522141',  'nama_sub_kegiatan' => 'Belanja Sewa','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '11','kode_sub_kegiatan' => '521131',  'nama_sub_kegiatan' => 'Belanja Barang Operasional - Penanganan Pandemi COVID-19','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '12','kode_sub_kegiatan' => '521131',  'nama_sub_kegiatan' => 'Belanja Barang Non Operasional - Penanganan Pandemi COVID-19','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '13','kode_sub_kegiatan' => '532111',  'nama_sub_kegiatan' => 'Belanja Modal Peralatan dan Mesin','created_at' => $now, 'updated_at' => $now],

        //     ['kegiatan_id' => '14','kode_sub_kegiatan' => '532111',  'nama_sub_kegiatan' => 'Belanja Modal Peralatan dan Mesin','created_at' => $now, 'updated_at' => $now],

		// ]);


    }
}

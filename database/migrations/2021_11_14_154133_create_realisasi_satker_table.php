<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiSatkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_satker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_satker_id')->nullable();
            $table->unsignedBigInteger('kegiatan_satker_id')->nullable();
            $table->unsignedBigInteger('sub_kegiatan_satker_id')->nullable();
            $table->unsignedBigInteger('menu_satker_id')->nullable();
            $table->unsignedBigInteger('rincian_satker_id')->nullable();
            $table->unsignedBigInteger('detil_satker_id')->nullable();
            $table->unsignedBigInteger('uraian_satker_id')->nullable();
            $table->string('satker')->nullable();
            $table->date('tanggal_kuitansi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('penerima')->nullable();
            $table->string('kode')->nullable();
            $table->string('uraian')->nullable();
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realiasi_satker');
    }
}

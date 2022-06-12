<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuKegiatanSatkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_kegiatan_satker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kegiatan_satker_id');
            $table->string('kode_menu')->nullable();
            $table->string('nama_menu');
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
        Schema::dropIfExists('menu_kegiatan_satker');
    }
}

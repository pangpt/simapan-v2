<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToPerencanaanSatkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perencanaan_satker', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('program_satker_id')->nullable();
            $table->unsignedBigInteger('kegiatan_satker_id')->nullable();
            $table->unsignedBigInteger('sub_kegiatan_satker_id')->nullable();
            $table->unsignedBigInteger('menu_satker_id')->nullable();
            $table->unsignedBigInteger('rincian_satker_id')->nullable();
            $table->unsignedBigInteger('detil_satker_id')->nullable();
            $table->unsignedBigInteger('uraian_satker_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_satker', function (Blueprint $table) {
            //
        });
    }
}

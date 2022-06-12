<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaguIdToRealisiSatkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realisasi_satker', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('perencanaan_satker_id')->nullable()->after('id');
            $table->bigInteger('pagu_jan')->nullable()->after('parent_id');
            $table->bigInteger('pagu_feb')->nullable()->after('parent_id');
            $table->bigInteger('pagu_mar')->nullable()->after('parent_id');
            $table->bigInteger('pagu_apr')->nullable()->after('parent_id');
            $table->bigInteger('pagu_mei')->nullable()->after('parent_id');
            $table->bigInteger('pagu_jun')->nullable()->after('parent_id');
            $table->bigInteger('pagu_jul')->nullable()->after('parent_id');
            $table->bigInteger('pagu_agt')->nullable()->after('parent_id');
            $table->bigInteger('pagu_sep')->nullable()->after('parent_id');
            $table->bigInteger('pagu_okt')->nullable()->after('parent_id');
            $table->bigInteger('pagu_nov')->nullable()->after('parent_id');
            $table->bigInteger('pagu_des')->nullable()->after('parent_id');
            $table->bigInteger('sisa')->nullable()->after('jumlah');
            $table->string('bulan')->after('tanggal_kuitansi')->nullable();
            $table->date('tanggal_input')->nullable()->after('tanggal_kuitansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realisi_satker', function (Blueprint $table) {
            //
        });
    }
}

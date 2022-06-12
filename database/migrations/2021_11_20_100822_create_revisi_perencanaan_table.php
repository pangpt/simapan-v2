<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiPerencanaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_perencanaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('submenu_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->unsignedBigInteger('kegiatan_id')->nullable();
            $table->unsignedBigInteger('sub_kegiatan_id')->nullable();
            $table->unsignedBigInteger('rincian_id')->nullable();
            $table->string('jenis_revisi')->nullable();
            $table->string('tanggal_revisi')->nullable();
            $table->date('tanggal_input')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('status')->nullable();
            $table->bigInteger('sisa_pagu')->nullable();
            $table->bigInteger('pagu_total')->nullable();
            $table->bigInteger('pagu_jan')->nullable();
            $table->bigInteger('pagu_feb')->nullable();
            $table->bigInteger('pagu_mar')->nullable();
            $table->bigInteger('pagu_apr')->nullable();
            $table->bigInteger('pagu_mei')->nullable();
            $table->bigInteger('pagu_jun')->nullable();
            $table->bigInteger('pagu_jul')->nullable();
            $table->bigInteger('pagu_agt')->nullable();
            $table->bigInteger('pagu_sep')->nullable();
            $table->bigInteger('pagu_okt')->nullable();
            $table->bigInteger('pagu_nov')->nullable();
            $table->bigInteger('pagu_des')->nullable();
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
        Schema::dropIfExists('revisi_perencanaan');
    }
}

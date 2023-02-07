<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disiplins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained();
            $table->string('tahun');
            $table->integer('jumlah_kehadiran');
            $table->integer('sakit');
            $table->integer('ijin');
            $table->integer('mangkir');
            $table->integer('cuti');
            $table->integer('terlambat');
            $table->integer('total_hari_kerja');
            $table->integer('kebersihan_diri');
            $table->integer('kerapihan_penampilan');
            $table->integer('kelengkapan_seragam');
            $table->integer('kebersihan_ruang_kerja');
            $table->integer('kerapihan_ruang_kerja');
            $table->integer('merawat_sarana_kerja');
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
        Schema::dropIfExists('disiplins');
    }
};

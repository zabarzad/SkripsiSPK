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
        Schema::create('kemampuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained();
            $table->integer('kualitas_pekerjaan');
            $table->integer('kuantitas_pekerjaan');
            $table->integer('tanggung_jawab');
            $table->integer('sikap_perilaku');
            $table->integer('kerja_sama');
            $table->integer('semangat_kerja');
            $table->integer('integritas');
            $table->integer('komunikasi');
            $table->integer('analisa_solusi');
            $table->integer('tindak_lanjut');
            $table->integer('rasa_memiliki');
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
        Schema::dropIfExists('kemampuans');
    }
};

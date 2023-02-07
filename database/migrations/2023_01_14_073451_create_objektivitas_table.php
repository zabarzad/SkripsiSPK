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
        Schema::create('objektivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained();
            $table->foreignId('posisi_id')->constrained();
            $table->string('tahun');
            $table->string('total_poin')->nullable();
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
        Schema::dropIfExists('objektivitas');
    }
};

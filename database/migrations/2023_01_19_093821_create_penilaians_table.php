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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained();
            $table->float('kehadiran', 8, 2)->nullable();
            $table->float('seragam', 8, 2)->nullable();
            $table->float('kebersihan', 8, 2)->nullable();
            $table->integer('kemampuan_id')->nullable();
            $table->integer('objektivitas_id')->default(0); // Mendapatkan nilai dari foreign id objektivitas
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
        Schema::dropIfExists('penilaians');
    }
};

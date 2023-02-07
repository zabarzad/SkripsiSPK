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
        Schema::create('topsis_hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained();
            $table->integer('tahun')->nullable();
            $table->float('d_max', 8, 2);
            $table->float('d_min', 8, 2);
            $table->float('nilai_preferensi', 8, 2);
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
        Schema::dropIfExists('topsis_hasils');
    }
};

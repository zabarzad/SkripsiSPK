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
        Schema::create('bobot_kriterias', function (Blueprint $table) {
            $table->id();
            $table->float('k1', 8, 2)->nullable();
            $table->float('k2', 8, 2)->nullable();
            $table->float('k3', 8, 2)->nullable();
            $table->float('ka', 8, 2)->nullable();
            $table->float('kb', 8, 2)->nullable();
            $table->float('kc', 8, 2)->nullable();
            $table->float('kd', 8, 2)->nullable();
            $table->float('ke', 8, 2)->nullable();
            $table->float('kf', 8, 2)->nullable();
            $table->float('kg', 8, 2)->nullable();
            $table->float('kh', 8, 2)->nullable();
            $table->float('ki', 8, 2)->nullable();
            $table->float('kj', 8, 2)->nullable();
            $table->float('kk', 8, 2)->nullable();
            $table->float('kl', 8, 2)->nullable();
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
        Schema::dropIfExists('bobot_kriterias');
    }
};

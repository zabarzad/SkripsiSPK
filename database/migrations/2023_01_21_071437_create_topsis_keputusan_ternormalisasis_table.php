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
        Schema::create('topsis_keputusan_ternormalisasis', function (Blueprint $table) {
            $table->id();
            $table->integer('k1')->nullable();
            $table->integer('k2')->nullable();
            $table->integer('k3')->nullable();
            $table->integer('ka')->nullable();
            $table->integer('kb')->nullable();
            $table->integer('kc')->nullable();
            $table->integer('kd')->nullable();
            $table->integer('ke')->nullable();
            $table->integer('kf')->nullable();
            $table->integer('kg')->nullable();
            $table->integer('kh')->nullable();
            $table->integer('ki')->nullable();
            $table->integer('kj')->nullable();
            $table->integer('kk')->nullable();
            $table->integer('kl')->nullable();
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
        Schema::dropIfExists('topsis_keputusan_ternormalisasis');
    }
};

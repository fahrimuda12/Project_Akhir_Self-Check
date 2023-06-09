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
        Schema::create('rule', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala', 5);
            $table->string('kode_penyakit', 5);
            $table->double('nilai_cf', 8, 1)->nullable();
            $table->timestamps();

            //referenced tables
            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule');
    }
};

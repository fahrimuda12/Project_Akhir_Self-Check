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
        Schema::create('riwayat_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit', 5);
            $table->string('kode_pasien', 15);
            $table->float('nilai_cf');
            $table->string('keterangan', 100);
            $table->timestamps();

            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('kode_pasien')->references('nrp')->on('user')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_penyakit');
    }
};

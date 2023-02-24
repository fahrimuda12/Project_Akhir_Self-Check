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
        Schema::create('penyakit', function (Blueprint $table) {
            $table->string('kode_penyakit', 5);
            $table->string('nip_dokter', 15);
            $table->string('nama_penyakit', 15);
            $table->timestamps();
            $table->primary('kode_penyakit');
            $table->foreign('nip_dokter')->references('nip_dokter')->on('pakar')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyakit');
    }
};

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
            $table->string('nip_dokter', 18)->nullable();
            $table->string('nip', 18)->nullable();
            $table->string('nama_penyakit', 50);
            $table->timestamps();
            $table->primary('kode_penyakit');
            $table->foreign('nip')->references('nip')->on('admin')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('nip_dokter')->references('nip_dokter')->on('pakar')->cascadeOnUpdate()->nullOnDelete();
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

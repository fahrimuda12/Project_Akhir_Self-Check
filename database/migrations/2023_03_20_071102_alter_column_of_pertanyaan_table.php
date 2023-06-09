<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->string('kode_gejala', 15)->after('id_pertanyaan');
            $table->unique('kode_gejala');

            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('opsi_1')->references('kode_skalar')->on('skalar_cf')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('opsi_2')->references('kode_skalar')->on('skalar_cf')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('opsi_3')->references('kode_skalar')->on('skalar_cf')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->dropIndex('pertanyaan_kode_gejala_unique');
        });
    }
};

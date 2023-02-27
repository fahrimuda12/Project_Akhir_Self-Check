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
        Schema::table('skalar_cf', function (Blueprint $table) {
            $table->dropColumn('id_skalar');
            $table->string('kode_skalar', 5)->first();
            $table->primary('kode_skalar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skalar_cf', function (Blueprint $table) {
            // $table->dropPrimary('kode_skalar');
            $table->dropColumn('kode_skalar');
            $table->id();
        });
    }
};

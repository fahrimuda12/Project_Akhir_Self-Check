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
            // $table->string('type')->after('kode_skalar')->default('skalar')->comment('skalar, cf, ds, ds_cf, ds_skalar, ds_cf_skalar, ds_cf_skalar');
            $table->string('tipe')->after('kode_skalar');
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
            $table->dropColumn('tipe');
        });
    }
};

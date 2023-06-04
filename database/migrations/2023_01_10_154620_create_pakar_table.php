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
        Schema::create('pakar', function (Blueprint $table) {
            $table->string('nip_dokter', 18);
            $table->string('nama_dokter', 25);
            $table->text('alamat');
            $table->integer('no_hp');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->timestamps();
            $table->primary('nip_dokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pakar');
    }
};

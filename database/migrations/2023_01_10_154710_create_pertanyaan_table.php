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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id('id_pertanyaan');
            $table->text('pertanyaan');
            $table->string('nip', 18)->nullable();
            $table->string('nip_dokter', 18)->nullable();
            $table->string('opsi_1', 15)->nullable();
            $table->string('opsi_2', 15)->nullable();
            $table->string('opsi_3', 15)->nullable();
            $table->timestamps();
            // $table->foreignUuid('nip');
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
        Schema::dropIfExists('pertanyaan');
    }
};

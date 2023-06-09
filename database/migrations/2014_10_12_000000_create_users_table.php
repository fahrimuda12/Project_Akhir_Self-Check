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
        // Schema::dropIfExists('user');
        Schema::create('user', function (Blueprint $table) {
            $table->string('nrp', 18);
            $table->string('nama', 25);
            $table->enum('jenkel', ['pria', 'perempuan']);
            $table->integer('umur');
            $table->text('alamat');
            $table->string('no_hp', 14);
            $table->string('email', 50)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('nrp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

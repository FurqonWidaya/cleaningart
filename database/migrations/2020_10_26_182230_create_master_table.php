<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->binary('foto')->nullable();
            $table->string('nama');
            $table->string('nohp');
            $table->string('email');
            $table->string('kecamatan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('username');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master');
    }
}

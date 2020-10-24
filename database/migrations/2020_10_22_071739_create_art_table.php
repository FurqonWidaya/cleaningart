<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('foto');
            $table->string('nama');
            $table->string('nohp');
            $table->integer('tanggallahir');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('kodepos');
            $table->string('status');
            $table->text('deskripsi');
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
        Schema::dropIfExists('art');
    }
}

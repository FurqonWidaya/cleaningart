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
            $table->integer('user_id');
            $table->timestamps();
            $table->binary('foto')->nullable();
            $table->string('name');
            $table->string('nohp')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kodepos')->nullable();
            $table->enum('status', ['Available', 'Hired']);
            $table->text('deskripsi')->nullable();
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

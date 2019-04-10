<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedInteger('id_level');
            $table->foreign('id_level')->references('id')->on('petugas')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('level', function (Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('nama_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}

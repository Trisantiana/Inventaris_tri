<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->unsignedInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->date('tanggal_register');
            $table->unsignedInteger('id_ruang');
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
            $table->string('kode_inventaris');
            $table->unsignedInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}

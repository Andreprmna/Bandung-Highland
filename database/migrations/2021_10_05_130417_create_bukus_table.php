<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->integer('id_pengarang');
            $table->integer('id_penerbit');
            $table->string('judul');
            $table->integer('tahun_rilis');
            $table->integer('halaman');
            $table->string('isbn');
            $table->string('deskripsi');
            $table->binary('sampul');
            $table->string('bentuk');
            $table->integer('kondisi')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('bukus');
    }
}

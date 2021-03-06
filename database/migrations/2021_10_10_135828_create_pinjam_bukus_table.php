<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_buku', function (Blueprint $table) {
            $table->id('id_pinjam_buku');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian')->nullable();
            $table->float('denda')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('pinjam_bukus');
    }
}

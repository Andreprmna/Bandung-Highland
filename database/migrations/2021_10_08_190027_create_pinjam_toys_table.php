<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamToysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_toys', function (Blueprint $table) {
            $table->id('id_pinjam_toy');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_toy');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->date('tgl_pengembalian');
            $table->float('denda');
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
        Schema::dropIfExists('pinjam_toys');
    }
}

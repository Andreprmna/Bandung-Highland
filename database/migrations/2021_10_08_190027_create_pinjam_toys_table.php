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
            $table->id();
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_toy');
            $table->date('waktu_pinjam');
            $table->date('waktu_pengembalian');
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

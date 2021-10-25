<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_bukus', function (Blueprint $table) {
            $table->id('id_booking_buku');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_buku');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
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
        Schema::dropIfExists('booking_bukus');
    }
}

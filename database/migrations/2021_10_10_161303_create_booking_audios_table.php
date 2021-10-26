<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_audios', function (Blueprint $table) {
            $table->id('id_booking_audio');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_audio');
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
        Schema::dropIfExists('booking_audios');
    }
}

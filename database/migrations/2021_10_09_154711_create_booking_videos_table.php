<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_videos', function (Blueprint $table) {
            $table->id('id_booking_video');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_video');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
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
        Schema::dropIfExists('booking_videos');
    }
}
